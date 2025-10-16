<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;
use App\Filament\Support\Traits\HasCart;

class Login extends Component
{
    use HasCart;
    public function mount()
    {
        $this->initializeCart();
        if (Auth::check()) {
            return redirect()->intended(route('shop.home'));
        }
    }

    public $email = '';
    public $password = '';
    public $remember = false;

    #[Url]
    public $redirect_to = '';
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];


    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            return redirect($this->redirect_to ?? route('shop.home'))->with('success', 'Logged in!');
        }

        $this->addError('email', 'Invalid credentials.');
    }
    public function render()
    {
        return view('livewire.pages.login', [
            'redirect_to' => request()->query('redirect_to')
        ]);
    }
}
