<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use App\Filament\Support\Traits\HasCart;

class Home extends Component
{
    use HasCart;

    public function mount()
    {
        $this->initializeCart();
    }

    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            return redirect()->intended(route('shop.home'));
        }

        $this->addError('email', 'Invalid credentials.');
    }

    public function render()
    {
        // $categories = SubCategory::with([
        //     'products' => function ($query) {
        //         $query->inRandomOrder()->take(6);
        //     }
        // ])->get();

        $products = Product::inRandomOrder()->take(6)->get();

        return view('livewire.pages.home', [
            'products' => $products,
        ]);
    }
}
