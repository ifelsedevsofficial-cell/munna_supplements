<?php

namespace App\Livewire\Pages;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Filament\Support\Traits\HasCart;
use App\Filament\Support\Traits\RedirectIfEmptyCart;
use App\Filament\Support\Traits\RedirectIfNotAuthenticated;

class Checkout extends Component
{
    use HasCart;
    use RedirectIfNotAuthenticated;
    use RedirectIfEmptyCart;

    public $cod_input = false;

    public function mount()
    {
        $this->ensureAuthenticated();
        $this->initializeCart();
        // $this->ensureCartIsNotEmpty();
    }
    public function render()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('product') // assuming you have Cart belongsTo Product
            ->get();


        $originalTotal   = $this->getCartOriginalSum($cartItems);
        $discountedTotal = $this->getCartDiscountedSum($cartItems);
        $youSave         = $originalTotal - $discountedTotal;

        return view('livewire.pages.checkout', [
            'cartItems' => $cartItems,
            'originalTotal'   => $originalTotal,
            'discountedTotal' => $discountedTotal,
            'youSave'         => $youSave,
        ]);
    }
}
