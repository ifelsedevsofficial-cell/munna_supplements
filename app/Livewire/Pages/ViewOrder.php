<?php

namespace App\Livewire\Pages;

use App\Filament\Support\Traits\HasCart;
use App\Models\Order;
use Livewire\Component;
use App\Filament\Support\Traits\RedirectIfNotAuthenticated;

class ViewOrder extends Component
{
    use RedirectIfNotAuthenticated;
    use HasCart;
    public $id;
    public function mount($id)
    {
        $this->ensureAuthenticated();
        $this->initializeCart();
        $this->id = $id;
    }
    public function render()
    {
        $order = Order::with('orderItems', 'orderItems.product', 'orderDetail')->findOrFail($this->id);
        return view('livewire.pages.view-order', [
            'order' => $order
        ]);
    }
}
