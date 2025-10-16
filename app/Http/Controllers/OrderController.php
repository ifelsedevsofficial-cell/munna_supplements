<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cancel($id)
    {
        $order = Order::findOrFail($id);

        // Check if the order can be cancelled
        if (!in_array($order->status, ['pending', 'processing'])) {
            return redirect()->back()->with('error', 'This order cannot be cancelled.');
        }


        try {
            // Update status
            $order->status = 'cancelled';
            $order->payment_status = 'unpaid';
            $order->save();
        } catch (Exception $error) {
            return redirect()->back()->with('error', $error);
        }


        return redirect()->route('order.show', $order->id)->with('success', 'Order has been cancelled successfully.');
    }
}
