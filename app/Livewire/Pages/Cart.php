<?php

namespace App\Livewire\Pages;

use App\Filament\Support\Traits\HasCart;
use App\Models\Cart as MCArt;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    use HasCart;

    public $cartItems = [];

    public function mount()
    {
        $this->initializeCart();
        $this->loadCartItems();
    }

    protected function loadCartItems()
    {
        if (Auth::check()) {
            // Fetch cart items from DB for the logged-in user,
            // including related product info via eager loading
            $this->cartItems = MCart::with('product')
                ->where('user_id', Auth::id())
                ->get()
                ->toArray();
        } else {
            // Get cart from session, default to empty array
            $sessionCart = session()->get('cart', []);

            // Transform session cart into array of items with product info
            $this->cartItems = [];

            foreach ($sessionCart as $productId => $item) {
                $product = Product::find($productId);
                if ($product) {
                    $this->cartItems[] = [
                        'product_id' => $productId,
                        'quantity' => $item['quantity'],
                        'product' => $product->toArray(),
                    ];
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.pages.cart', ['cartItems' => $this->cartItems]);
    }
}
