<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Filament\Support\Traits\HasCart;

class Contact extends Component
{
    use HasCart;

    public function mount()
    {
        $this->initializeCart();
    }

    public function render()
    {
        return view('livewire.pages.contact');
    }
}
