<?php

use App\Livewire\Pages\Cart;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Shop;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Login;
use App\Livewire\Pages\Orders;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\Product;
use App\Livewire\Pages\Checkout;
use App\Livewire\Pages\Register;
use App\Livewire\PrivacyPolicy;
use App\Livewire\RefundPolicy;
use App\Livewire\TermsOfService;
use App\Livewire\Pages\ViewOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('admin/settings', function () {
    return redirect(route('filament.admin.pages.settings.general-settings'));
})->name('default-settings');

Route::get('/command/{command}', function ($command) {
    $output = Artisan::call($command);

    return nl2br($output);
});

Route::get('/optimize', function () {
    $output = Artisan::call('optimize');

    return back();
})->name('optimize');

Route::get('/optimize/clear', function () {
    $output = Artisan::call('optimize:clear');

    return back();
})->name('optimize:clear');

Route::get('/', Home::class)->name('shop.home');

Route::get('/products', Shop::class)->name('shop');

Route::get('/products/{id}/{name}', Product::class)->name('product');

Route::get('/cart', Cart::class)->name('cart');

Route::get('/checkout', Checkout::class)->name('checkout');

Route::get('/login', Login::class)->name('shop.login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('shop.home'));
})->name('shop.logout');

Route::get('/register', Register::class)->name('shop.register');

Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.submit');

Route::get('/orders', Orders::class)->name('orders');

Route::get('/orders/{id}', ViewOrder::class)->name('order.show');

Route::get('/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');

Route::get('/about', About::class)->name('shop.about');

Route::get('/contact', Contact::class)->name('shop.contact');

Route::get('print/{model}/{id}/download', [PDFController::class, 'print'])->name('pdf.print');

Route::get('/terms-of-service', TermsOfService::class)->name('service.terms');

Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacy.policy');

Route::get('/refund-policy', RefundPolicy::class)->name('refund.policy');

