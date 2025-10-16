<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;
use App\Filament\Support\Traits\HasCart;

class Register extends Component
{
    use HasCart;
    public function mount()
    {
        $this->initializeCart();
        if (Auth::check()) {
            return redirect()->intended(route('shop.home'));
        }
    }

    public $name = '';
    public $email = '';
    public $password = '';

    public $password_confirmation = '';


    #[Url]
    public $redirect_to = '';

    protected $rules = [
        'name' => 'required|string|min:3|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => $this->password,
        ]);

        Auth::login($user);

        session()->regenerate();


        return redirect($this->redirect_to ?? route('shop.home'))->with('success', 'Logged in!');
    }

    public function render()
    {
        return view('livewire.pages.register');
    }
}
