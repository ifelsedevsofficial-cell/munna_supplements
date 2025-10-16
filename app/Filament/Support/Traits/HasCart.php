<?php

namespace App\Filament\Support\Traits;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait HasCart
{
    public $cartCount = 0;

    public $quantity;

    public function initializeCart()
    {
        $this->updateCartCount(showToast: false);
    }

    public function inc()
    {
        $this->quantity = $this->quantity += 1;
    }

    public function dec()
    {
        if ($this->quantity > 1) {
            $this->quantity = $this->quantity -= 1;
        }
    }

    protected function addQuantityToCart($productId, $quantity = 1)
    {
        $product = Product::find($productId);
        if (! $product) {
            return 'Product not found.';
        }

        if (Auth::check()) {
            $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();

            $currentQty = $cartItem ? $cartItem->quantity : 0;
            $newQty = $currentQty + $quantity;

            if ($newQty > $product->stock) {
                return 'Cannot add more than available stock.';
            }

            if ($cartItem) {
                $cartItem->quantity = $newQty;
                $cartItem->save();

                return 'Product quantity updated in your cart.';
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);

                return 'Product added to your cart.';
            }
        } else {
            $cart = session()->get('cart', []);
            $currentQty = isset($cart[$productId]) ? $cart[$productId]['quantity'] : 0;
            $newQty = $currentQty + $quantity;

            if ($newQty > $product->stock) {
                return 'Cannot add more than available stock.';
            }

            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => $newQty,
            ];

            session()->put('cart', $cart);

            return $currentQty > 0 ? 'Product quantity updated in your cart.' : 'Product added to your cart.';
        }
    }

    public function addToCart($productId)
    {
        $qty = $this->quantity ?? 1;
        $message = $this->addQuantityToCart($productId, $qty);
        $this->updateCartCount($message);
    }

    public function addToCartAndRedirect($productId)
    {
        $message = $this->addQuantityToCart($productId, 1);
        $this->updateCartCount($message);
        $this->redirect(route('cart'));
    }

    public function removeFromCart($itemId)
    {
        if (Auth::check()) {

            $item = Cart::where('id', $itemId)->where('user_id', Auth::id())->delete();
            // dd($item, $itemId);
        } else {
            $cart = session('cart', []);

            // dd($itemId, $cart);
            if (! empty($cart)) {
                unset($cart[$itemId]); // $productId here is the array index (e.g. $loop->index)
                session()->put('cart', $cart);
            }
        }
        $this->mount();
    }

    public function increment($productId)
    {
        $message = $this->addQuantityToCart($productId, 1);
        $this->updateCartCount($message);
        $this->mount();
    }

    public function decrement($productId)
    {
        $quantity = 1;

        if (Auth::check()) {
            $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();

            if ($cartItem && $cartItem->quantity > 1) {
                // prevent going below 1
                $cartItem->decrement('quantity', $quantity);
            }
        } else {
            $cart = session()->get('cart', []);

            if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity'] -= $quantity;
                session()->put('cart', $cart);
            }
        }

        // Update cart count and refresh cart items
        $this->updateCartCount();
        $this->mount();
    }

    public function getCartDiscountedTotalProperty()
    {
        $total = 0;

        foreach ($this->cartItems as $item) {
            // Access product price safely (handle object or array)
            $product = is_array($item['product']) ? $item['product'] : (array) $item['product'];
            $price = $product['discounted_price'] ?? 0;
            $quantity = $item['quantity'] ?? 0;
            $total += $price * $quantity;
        }

        return $total;
    }

    public function getCartOriginalTotalProperty()
    {
        $total = 0;

        foreach ($this->cartItems as $item) {
            $product = is_array($item['product']) ? $item['product'] : (array) $item['product'];
            $price = $product['original_price'] ?? ($product['discounted_price'] ?? 0); // fallback
            $quantity = $item['quantity'] ?? 0;
            $total += $price * $quantity;
        }

        return $total;
    }

    public function getCartOriginalSum($cartItems)
    {
        return $cartItems->sum(fn($item) => $item->quantity * $item->product->original_price);
    }

    public function getCartDiscountedSum($cartItems)
    {
        return $cartItems->sum(fn($item) => $item->quantity * $item->product->discounted_price);
    }


    public function updateCartCount($message = null, bool|null $showToast = true)
    {
        if (Auth::check()) {
            // Merge session cart into DB cart if needed
            $sessionCart = session('cart', []);

            if (! empty($sessionCart)) {
                $userId = Auth::id();

                foreach ($sessionCart as $productId => $item) {
                    $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();

                    if ($cartItem) {
                        $cartItem->quantity += $item['quantity'];
                        $cartItem->save();
                    } else {
                        Cart::updateOrCreate(
                            [
                                'user_id' => $userId,
                                'product_id' => $productId,
                            ],
                            [
                                'quantity' => $item['quantity'],
                            ],
                        );
                    }
                }

                session()->forget('cart');
            }

            $this->cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
        } else {
            $cart = session('cart', []);
            $this->cartCount = collect($cart)->sum('quantity');
        }

        // ✅ Always dispatch one consistent event
        $this->dispatch('cart-updated', [
            'count' => $this->cartCount,
            'message' => $message ?? 'Cart updated.',
            'showToast' => $showToast,
        ]);
    }
}
