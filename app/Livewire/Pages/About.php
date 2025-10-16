<?php

namespace App\Livewire\Pages;

use App\Filament\Support\Traits\HasCart;
use Livewire\Component;

class About extends Component
{
    use HasCart;

    public function mount(){
        $this->initializeCart();
    }

    public function render()
    {
        return view('livewire.pages.about');
    }
}
