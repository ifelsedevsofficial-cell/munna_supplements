<?php

namespace App\Livewire\Pages;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Filament\Support\Traits\HasCart;
use App\Filament\Support\Traits\RedirectIfNotAuthenticated;

class Orders extends Component
{
    use RedirectIfNotAuthenticated;
    use HasCart;

    public function mount()
    {
        $this->initializeCart();
        $this->ensureAuthenticated();
    }
    public function render()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.pages.orders', [
            'orders' => $orders
        ]);
    }
}
