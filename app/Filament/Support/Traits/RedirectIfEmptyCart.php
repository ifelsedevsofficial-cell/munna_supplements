<?php

namespace App\Filament\Support\Traits;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

trait RedirectIfEmptyCart
{
    protected function ensureCartIsNotEmpty()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect('cart')->with('error', 'Your cart is empty.');
        }
    }
}
