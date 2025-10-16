<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect('checkout')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'address'      => 'required|string|max:500',
            'city'         => 'required|string|max:255',
            'email'        => 'required|email',
            'phone_number' => 'required|regex:/^[0-9]{11}$/',
            'payment'      => 'required|in:cod,online',
            'accept_terms' => 'accepted'
        ], [
            'payment.in' => 'Please select a valid payment method (Cash on Delivery or Online).',
            'phone_number.regex' => 'Phone number must be 11 digits (e.g. 03314225652).',
        ]);

        if ($request->input('payment') === 'online') {
            $request->validate([
                'transaction_image' => 'required'
            ]);
        }

        // Wrap in a transaction to stay safe
        DB::beginTransaction();

        try {
            // Calculate total
            $subtotal = $cartItems->sum(function ($item) {
                return $item->product->discounted_price * $item->quantity;
            });

            $shipping = 0; // you can make this dynamic from request
            $total = $subtotal + $shipping;


            // Create order
            $order = Order::create([
                'user_id'        => Auth::id(),
                'total_amount'   => $total,
                'status'         => 'pending',
                'payment_status' => $validated['payment'] === 'online' ? 'paid' : 'unpaid',
                'payment_method' => $validated['payment'],
            ]);

            $transactionImagePath = null;

            if ($request->hasFile('transaction_image')) {
                $transactionImagePath = $request->file('transaction_image')->store('images/orders/transactions', 'public');
            }

            $order->transaction_image = $transactionImagePath;

            $order->save();

            // After creating $order
            $order->orderDetail()->create([
                'name'         => $validated['name'],
                'address'      => $validated['address'],
                'city'         => $validated['city'],
                'phone_number' => $validated['phone_number'],
            ]);

            // Create order items
            foreach ($cartItems as $item) {
                $order->orderItems()->create([
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->discounted_price,
                ]);
            }

            // Clear cart
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect(route('order.show', ['id' => $order->id]))
                // redirect()
                // ->route('orders.show', $order->id)
                ->with('success', 'Order placed successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Checkout failed: ' . $e->getMessage());
        }
    }
}
