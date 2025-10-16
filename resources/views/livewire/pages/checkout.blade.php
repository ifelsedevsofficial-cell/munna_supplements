     <main class="fix">

         <!-- breadcrumb-area-start -->
         <section class="eg-breadcrumb__area theme-bg mb-130 p-relative z-index-1 scene">
             <div class="eg-breadcrumb">
                 <div class="container">
                     <div class="row justify-content-center">
                         <div class="col-lg-12">
                             <div class="eg-breadcrumb__title-opacity d-flex justify-content-center">
                                 <h2 class="title">Checkout</h2>
                             </div>
                             <div class="eg-breadcrumb__content">
                                 <h2 class="title"> Checkout</h2>
                                 <nav aria-label="breadcrumb">
                                     <ol class="eg-breadcrumb__list">
                                         <li class="eg-breadcrumb__item"><a href="{{ route('shop.home') }}">Home</a>
                                         </li>
                                         <li class="eg-breadcrumb__item active" aria-current="page">Checkout</li>
                                     </ol>
                                 </nav>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="eg-banner__circle-1"></div>
                 <div class="eg-breadcrumb__shape one">
                     <img class="layer" data-depth="0.3" src="assets/img/banner/banner-shape-01.png" alt="img">
                 </div>
                 <div class="eg-breadcrumb__shape two scene-y">
                     <img class="layer" data-depth="3" src="assets/img/banner/banner-shape-02.png" alt="shape">
                 </div>
                 <div class="eg-breadcrumb__shape three">
                     <img class="layer" data-depth="0.3" src="assets/img/banner/banner-shape-03.png" alt="shape">
                 </div>
                 <div class="eg-breadcrumb__shape four">
                     <img class="layer" data-depth="0.3" src="assets/img/banner/banner-shape-04.png" alt="shape">
                 </div>
             </div>
         </section>
         <!-- breadcrumb-area-start -->

         <!-- cart-area-start -->
         <form class="eg-checkout__area mb-120" method="POST" enctype="multipart/form-data"
             action="{{ route('checkout.submit') }}">
             @csrf
             <div class="container">
                 {{-- <div class="eg-checkout__notice mb-15">Returning Customer? <a href="">Click here to Login</a> --}}
             </div>
             <div class="row">
                 <div class="col-lg-7">
                     <div class="eg-checkout__wrapper">
                         <div class="eg-checkout__billing-address">
                             <h3 class="eg-checkout__title mb-35">Billing details</h3>
                             <div class="eg-checkout__form">
                                 {{-- <div class="row">
                                         <div class="col-xl-12">
                                             <div class="eg-checkout__input-box">
                                                 <select class="selectpicker shop-filter">
                                                     <option selected="">Select a country</option>
                                                     <option value="1">Canada</option>
                                                     <option value="2">England</option>
                                                     <option value="3">Australia</option>
                                                 </select>
                                             </div>
                                         </div>
                                     </div> --}}
                                 <div class="row bs-gutter-x-20">
                                     <div class="col-xl-12">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="name"
                                                 value="{{ old('name', auth()->user()->name) }}" placeholder="Name"
                                                 required="">
                                             @error('name')
                                                 <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                         </div>
                                     </div>
                                     {{-- <div class="col-xl-6">
                                             <div class="eg-checkout__input-box">
                                                 <input type="text" name="last_name" value=""
                                                     placeholder="Last name" required="">
                                             </div>
                                         </div> --}}
                                 </div>
                                 <div class="row">
                                     {{-- <div class="col-xl-12">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="company_name" value=""
                                                 placeholder="Company">
                                         </div>
                                     </div> --}}
                                     <div class="col-xl-12">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="address" value="{{ old('name', '') }}"
                                                 placeholder="Address">
                                             @error('address')
                                                 <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                         </div>
                                     </div>
                                     {{-- <div class="col-xl-12">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="company_name" value=""
                                                 placeholder="Appartment, unit, etc. (optional)">
                                         </div>
                                     </div> --}}
                                     <div class="col-xl-12">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="city" value="{{ old('city', '') }}"
                                                 placeholder="Town / City" required="">
                                             @error('city')
                                                 <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row bs-gutter-x-20">
                                     {{-- <div class="col-xl-6">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="state" value="{{ old('state', '') }}"
                                                 placeholder="State" required="">
                                             @error('state')
                                                 <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                         </div>
                                     </div>
                                     <div class="col-xl-6">
                                         <div class="eg-checkout__input-box">
                                             <input name="zip" type="text" value="{{ old('zip', '') }}"
                                                 pattern="[0-9]*" placeholder="Zip code">
                                             @error('zip')
                                                 <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                         </div>
                                     </div> --}}
                                     <div class="col-xl-6">
                                         <div class="eg-checkout__input-box">
                                             <input readonly name="email" type="email"
                                                 value="{{ auth()->user()->email }}" placeholder="Email address">
                                         </div>
                                     </div>
                                     <div class="col-xl-6">
                                         <div class="eg-checkout__input-box">
                                             <input type="number" name="phone_number" required=""
                                                 value="{{ old('phone_number', '') }}" placeholder="Phone">
                                             @error('phone_number')
                                                 <small class="text-danger">{{ $message }}</small>
                                             @enderror
                                         </div>
                                     </div>
                                 </div>
                                 {{-- <div class="row">
                                     <div class="col-xl-12">
                                         <div class="eg-checkout__check-box">
                                             <input id="create_free_account" type="checkbox">
                                             <label for="create_free_account">Create an
                                                 Account?<span></span></label>
                                         </div>
                                     </div>
                                 </div> --}}
                             </div>
                         </div>
                         {{-- <div class="eg-checkout__shipping-address mt-60">
                             <div class="col-xl-12">
                                 <div class="eg-checkout__check-box eg-checkout__shipping-title mb-35">
                                     <input id="create_shipping_account" type="checkbox">
                                     <label for="create_shipping_account">Ship to a different
                                         address<span></span></label>
                                 </div>
                             </div>
                             <form class="eg-checkout__form">
                                 <div class="row">
                                     <div class="col-xl-12">
                                         <div class="eg-checkout__input-box">
                                             <select class="selectpicker shop-filter">
                                                 <option selected="">Select a country</option>
                                                 <option value="1">Canada</option>
                                                 <option value="2">England</option>
                                                 <option value="3">Australia</option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row bs-gutter-x-20">
                                     <div class="col-xl-6">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="first_name" value=""
                                                 placeholder="First name" required="">
                                         </div>
                                     </div>
                                     <div class="col-xl-6">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="last_name" value=""
                                                 placeholder="Last name" required="">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-xl-12">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="company_name" value=""
                                                 placeholder="Company">
                                         </div>
                                     </div>
                                     <div class="col-xl-12">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="Address" value=""
                                                 placeholder="Address">
                                         </div>
                                     </div>
                                     <div class="col-xl-12">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="company_name" value=""
                                                 placeholder="Appartment, unit, etc. (optional)">
                                         </div>
                                     </div>
                                     <div class="col-xl-12">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="Town/City" value=""
                                                 placeholder="Town / City" required="">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row bs-gutter-x-20">
                                     <div class="col-xl-6">
                                         <div class="eg-checkout__input-box">
                                             <input type="text" name="State" value="" placeholder="State"
                                                 required="">
                                         </div>
                                     </div>
                                     <div class="col-xl-6">
                                         <div class="eg-checkout__input-box">
                                             <input name="form_zip" type="text" pattern="[0-9]*"
                                                 placeholder="Zip code">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row bs-gutter-x-20">
                                     <div class="col-xl-6">
                                         <div class="eg-checkout__input-box">
                                             <input name="email" type="email" placeholder="Email Address">
                                         </div>
                                     </div>
                                     <div class="col-xl-6">
                                         <div class="eg-checkout__input-box">
                                             <input type="tel" name="form_phone"
                                                 pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required=""
                                                 placeholder="Phone">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-xl-12">
                                         <div class="eg-checkout__input-box texarea-box">
                                             <textarea placeholder="Notes about your order" name="form_order_notes"></textarea>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div> --}}
                     </div>
                 </div>
                 <div class="col-lg-5">
                     <div class="eg-order__place">
                         <h3 class="eg-checkout__title">Your Order</h3>
                         <div class="eg-order__info-list">
                             <ul>
                                 <li class="eg-order__info-list-header">
                                     <h4>Product</h4>
                                     <h4>Total</h4>
                                 </li>
                                 @foreach ($cartItems as $item)
                                     <li class="eg-order__info-list-desc d-flex justify-content-between">
                                         <div>
                                             <p class="mb-0">
                                                 {{ $item->product->name }}
                                                 <span class="text-muted">× {{ $item->quantity }}</span>
                                             </p>

                                             @if ($item->product->original_price > $item->product->discounted_price)
                                                 <small class="text-muted d-block"
                                                     style="text-decoration: line-through;">
                                                     PKR
                                                     {{ number_format($item->product->original_price * $item->quantity, 2) }}
                                                 </small>

                                                 <span class="badge bg-danger"
                                                     style="font-size: 12px; font-weight: 500; color: white;">
                                                     {{ round((($item->product->original_price - $item->product->discounted_price) / $item->product->original_price) * 100) }}%
                                                     OFF
                                                 </span>
                                             @endif
                                         </div>

                                         <div class="text-end">
                                             <span>
                                                 PKR
                                                 {{ number_format($item->product->discounted_price * $item->quantity, 2) }}
                                             </span>
                                         </div>
                                     </li>
                                 @endforeach
                                 {{-- <li class="eg-order__info-list-subtotal">
                                     <span>Subtotal</span>
                                     <span>PKR {{ number_format($subtotal, 2) }}</span>
                                 </li> --}}
                                 {{-- <li class="eg-order__info-list-shipping">
                                     <span>Shipping</span>
                                     <div class="eg-cart-checkout__shipping-option-wrapper ">
                                         <div class="eg-cart-checkout__shipping-option eg-order__shipping">
                                             <input id="flat_rate" type="radio" name="shipping">
                                             <label for="flat_rate">Flat rate : <span>$20.00</span></label>
                                         </div>
                                         <div class="eg-cart-checkout__shipping-option eg-order__shipping">
                                             <input id="local_pickup" type="radio" name="shipping">
                                             <label for="local_pickup">Local pickup : <span> $25.00</span></label>
                                         </div>
                                         <div class="eg-cart-checkout__shipping-option eg-order__shipping">
                                             <input id="free_shipping" type="radio" name="shipping">
                                             <label for="free_shipping">Free shipping</label>
                                         </div>
                                     </div>
                                 </li> --}}
                                 @if ($youSave > 0)
                                     <li class="eg-order__info-list-total d-flex justify-content-between">
                                         <span class="">Original Total</span>
                                         <span class="text-danger fw-bold" style="text-decoration: line-through;">
                                             PKR {{ number_format($originalTotal, 2) }}
                                         </span>
                                     </li>

                                     <li class="eg-order__info-list-total d-flex justify-content-between">
                                         <span>Discount</span>
                                         <span class="text-warning fw-bold">
                                             - PKR {{ number_format($youSave, 2) }}
                                             ({{ round(($youSave / $originalTotal) * 100) }}%)
                                         </span>
                                     </li>

                                     <li class="eg-order__info-list-total d-flex justify-content-between">
                                         <span>You Save</span>
                                         <span class="text-success fw-bold">
                                             PKR {{ number_format($youSave, 2) }}
                                             ({{ round(($youSave / $originalTotal) * 100) }}%)
                                         </span>
                                     </li>
                                 @endif

                                 <li class="eg-order__info-list-total d-flex justify-content-between">
                                     <span><strong>Total</strong></span>
                                     <span><strong>PKR {{ number_format($discountedTotal, 2) }}</strong></span>
                                 </li>
                             </ul>
                         </div>
                         <div class="eg-checkout-payment">
                             {{-- <div class="eg-checkout-payment__item eg-cart-checkout__shipping-option">
                                 <input type="radio" id="back_transfer" name="payment">
                                 <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Payment Bank
                                     Transfer</label>
                                 <div class="eg-checkout-payment__desc direct-bank-transfer">
                                     <p>Make your payment directly into our bank account. Please use your Order ID
                                         as the payment
                                         reference. Your order will not be shipped until the funds have cleared in
                                         our account.</p>
                                 </div>
                             </div> --}}

                             {{-- <div x-data="{ payment: '{{ old('payment') }}' }">
                                 <!-- Payment Methods -->
                                 <div class="eg-checkout-payment__item eg-cart-checkout__shipping-option">
                                     <input {{ old('payment') === 'online' ? 'checked' : '' }} type="radio"
                                         id="online" name="payment" value="online" x-model="payment">
                                     <label for="online">Online (EasyPaisa)</label>
                                 </div>

                                 <!-- Show phone input only when COD selected -->
                                 <div class="col-xl-12 mt-3" x-show="payment === 'online'">
                                     <div class="eg-checkout__input-box">
                                         <input readonly type="number" name="account_no"
                                             value="{{ $settings->account_no ?? null }}"
                                             placeholder="Account number">
                                         @error('account_no')
                                             <small class="text-danger">{{ $message }}</small>
                                         @enderror
                                     </div>
                                     <div class="eg-checkout__input-box">
                                         <span>Please Attach Payment Receipt Image</span>
                                         <input readonly type="file" name="transaction_image" style=""
                                             placeholder="Transaction Image">
                                         @error('transaction_image')
                                             <small class="text-danger">{{ $message }}</small>
                                         @enderror
                                     </div>
                                     <div class="eg-checkout__input-box">
                                         <input readonly type="number" name="account_no"
                                             value="{{ $settings->account_no ?? null }}"
                                             placeholder="Account number">
                                         @error('account_no')
                                             <small class="text-danger">{{ $message }}</small>
                                         @enderror
                                     </div>
                                 </div>

                                 <div class="eg-checkout-payment__item eg-cart-checkout__shipping-option">
                                     <input {{ old('payment') === 'cod' ? 'checked' : '' }} type="radio"
                                         id="cod" name="payment" value="cod" x-model="payment">
                                     <label for="cod">Cash on Delivery</label>
                                 </div>

                             </div> --}}

                             <div x-data="{
                                 payment: '{{ old('payment') }}',
                                 imagePreview: null
                             }">

                                 <!-- Payment Methods -->
                                 <div class="eg-checkout-payment__item eg-cart-checkout__shipping-option">
                                     <input type="radio" id="online" name="payment" value="online"
                                         x-model="payment">
                                     <label for="online">Online (EasyPaisa)</label>
                                 </div>

                                 <div class="eg-checkout-payment__item eg-cart-checkout__shipping-option">
                                     <input type="radio" id="cod" name="payment" value="cod"
                                         x-model="payment">
                                     <label for="cod">Cash on Delivery</label>
                                 </div>

                                 <!-- Online Payment Details -->
                                 <div class="col-xl-12 mt-3" x-show="payment === 'online'" x-transition>
                                     <div class="eg-checkout__input-box">
                                         <input readonly type="number" name="account_no"
                                             value="{{ $settings->account_no ?? null }}"
                                             placeholder="Account number">
                                         @error('account_no')
                                             <small class="text-danger">{{ $message }}</small>
                                         @enderror
                                     </div>

                                     <div class="eg-checkout__input-box mt-3">
                                         <span>Please Attach Payment Receipt Image</span>
                                         <input type="file" name="transaction_image" accept="image/*"
                                             @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                                         @error('transaction_image')
                                             <small class="text-danger">{{ $message }}</small>
                                         @enderror

                                         <!-- Image preview -->
                                         <template x-if="imagePreview">
                                             <div class="mt-3">
                                                 <img :src="imagePreview" alt="Payment Receipt Preview"
                                                     class="rounded shadow"
                                                     style="max-height: 400px; border: 1px solid #ddd;">
                                             </div>
                                         </template>
                                     </div>
                                 </div>
                             </div>

                             {{-- <div class="eg-checkout-payment__item eg-cart-checkout__shipping-option">
                                 <input type="radio" id="cod" name="payment" name="online">
                                 <label for="cod">Cash on Delivery</label>
                                 <div class="eg-checkout-payment__desc cash-on-delivery">
                                     <p>Make your payment directly into our bank account. Please use your Order ID
                                         as the payment
                                         reference. Your order will not be shipped until the funds have cleared in
                                         our account.</p>
                                 </div>
                             </div> --}}
                             @error('payment')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                             {{-- <div class="eg-checkout-payment__item paypal-payment eg-cart-checkout__shipping-option">
                                 <input type="radio" id="paypal" name="payment">
                                 <label for="paypal">PayPal <img src="assets/img/icon/payment-option.png"
                                         alt=""></label>
                             </div> --}}
                         </div>
                         <div class="eg-checkout__agree mb-25">
                             <div class="eg-checkout__option eg-checkout__check-box">
                                 <input id="read_all" name="accept_terms" {{ old('accept_terms') ? 'checked' : '' }}
                                     type="checkbox">
                                 <label for="read_all">I have read and agree to the website.</label>
                             </div>
                             @error('accept_terms')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="eg-checkout__btn-wrapper">
                             @if ($cartItems->isEmpty())
                                 <button type="button" class="eg-checkout__btn eg-btn w-100"
                                     onclick="alert('Your cart is empty! Please add items before placing an order.')">
                                     Place Order
                                 </button>
                             @else
                                 <button type="submit" class="eg-checkout__btn eg-btn w-100">
                                     Place Order
                                 </button>
                             @endif
                         </div>
                     </div>
                 </div>
             </div>
             </div>
         </form>
         <!-- cart-area-start -->

     </main>
