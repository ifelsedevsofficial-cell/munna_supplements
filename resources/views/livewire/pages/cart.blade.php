    <main class="fix">

        <!-- breadcrumb-area-start -->
        <section class="eg-breadcrumb__area theme-bg mb-130 p-relative z-index-1 scene d-none d-md-block">
            <div class="eg-breadcrumb">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="eg-breadcrumb__title-opacity d-flex justify-content-center">
                                    <h2 class="title">Cart</h2>
                                </div>
                            </div>
                            <div class="eg-breadcrumb__content">
                                <h2 class="title"> Cart</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="eg-breadcrumb__list">
                                        <li class="eg-breadcrumb__item"><a href="{{ route('shop.home') }}">Home</a></li>
                                        <li class="eg-breadcrumb__item active" aria-current="page">Cart</li>
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
        <section class="eg-cart__area mb-95">
            <div style="height:100px;" class="d-md-none"></div>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-9 col-lg-8">
                        <div class="eg-cart mr-30">
                            <div class="eg-cart__responsive">
                                <table class="table eg-cart__table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cartItems as $key => $item)
                                            @php
                                                // dd($item);
                                                $product = $item['product'];
                                            @endphp

                                            <tr>
                                                <td class="eg-cart__meta d-flex align-items-center">
                                                    <div class="eg-cart__meta-img">
                                                        <img src="{{ asset('storage/' . $product['image']) }}"
                                                            alt="{{ $product['name'] }}">
                                                    </div>
                                                    <h3 class="eg-cart__meta-title">
                                                        <a
                                                            href="{{ route('product', [
                                                                'id' => $product['id'],
                                                                'name' => Illuminate\Support\Str::slug($product['name']),
                                                            ]) }}">
                                                            {{ $product['name'] }}
                                                        </a>
                                                    </h3>
                                                </td>
                                                <td class="eg-cart__price">
                                                    <span>
                                                        PKR {{ number_format($product['discounted_price'], 2) }}
                                                    </span>

                                                    @if (isset($product['original_price']) &&
                                                            $product['original_price'] > 0 &&
                                                            $product['discounted_price'] < $product['original_price']
                                                    )
                                                        {{-- <div class="eg-product__badge"
                                                            style="display:inline-block; margin-left: 6px; color:white; font-weight:bold;">
                                                            {{ round((($product['original_price'] - $product['discounted_price']) / $product['original_price']) * 100) }}%
                                                            Off
                                                        </div> --}}
                                                        <br>
                                                        <small style="text-decoration: line-through; color: #e53935;">
                                                            PKR {{ number_format($product['original_price'], 2) }}
                                                        </small>
                                                    @endif
                                                </td>

                                                <td class="eg-product-details__quantity-box">
                                                    <div class="eg-product-details__quantity-box">
                                                        <button wire:click="decrement({{ $product['id'] }})"
                                                            class="eg-product-details__quantity-btn minus decrement"><i
                                                                class="fa fa-minus"></i></button>
                                                        <span class="counter">{{ $item['quantity'] }}</span>
                                                        <button wire:click="increment({{ $product['id'] }})"
                                                            class="eg-product-details__quantity-btn plus increment"><i
                                                                class="fa fa-plus"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    PKR
                                                    {{ number_format($product['discounted_price'] * $item['quantity'], 2) }}
                                                </td>
                                                <td>
                                                    <a style="cursor: pointer;"
                                                        wire:click="removeFromCart({{ $item['id'] ?? $item['product_id'] }})"
                                                        class="table eg-cart__remove">
                                                        <svg width="17" height="17" viewBox="0 0 10 10"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">
                                                    No Items in your cart.
                                                    <a href="{{ route('shop') }}"
                                                        style="text-decoration: underline; color: skyblue; margin-left: 2px;">
                                                        Go to products
                                                    </a>
                                                </td>
                                            <tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="eg-cart__bottom mt-60">
                                <div class="row align-items-end">
                                    <div class="col-xl-6 col-md-8 mb-25">
                                        <div class="eg-cart__coupon">
                                            <form action="cart.html#">
                                                <div class="eg-cart__coupon-input-box">
                                                    <label>Coupon Code:</label>
                                                    <div class="eg-cart__coupon-input d-flex align-items-center">
                                                        <input type="text" placeholder="Enter Coupon Code">
                                                        <button type="submit">Apply</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-4 mb-25">
                                        <div class="eg-cart__update text-md-end">
                                            <button type="button" class="eg-cart__update-btn eg-btn"> Update Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="eg-cart-checkout__wrapper">
                            {{-- <div class="eg-cart-checkout__top d-flex align-items-center justify-content-between">
                                <span class="eg-cart-checkout__top-title">Subtotal</span>
                                <span class="eg-cart-checkout__top-price">$740</span>
                            </div> --}}
                            {{-- <div class="eg-cart-checkout__shipping">
                                <h4 class="eg-cart-checkout__shipping-title">Shipping</h4>

                                <div class="eg-cart-checkout__shipping-option-wrapper">
                                    <div class="eg-cart-checkout__shipping-option">
                                        <input id="flat_rate" type="radio" name="shipping">
                                        <label for="flat_rate">Flat rate : <span>$20.00</span></label>
                                    </div>
                                    <div class="eg-cart-checkout__shipping-option">
                                        <input id="local_pickup" type="radio" name="shipping">
                                        <label for="local_pickup">Local pickup : <span> $25.00</span></label>
                                    </div>
                                    <div class="eg-cart-checkout__shipping-option">
                                        <input id="free_shipping" type="radio" name="shipping">
                                        <label for="free_shipping">Free shipping</label>
                                    </div>
                                </div>
                            </div> --}}
                            @if ($this->cartOriginalTotal > $this->cartDiscountedTotal)
                                <div class="eg-cart-checkout__total d-flex align-items-center justify-content-between">
                                    <span>Original Total</span>
                                    <span style="text-decoration: line-through; color: #888;">
                                        PKR {{ number_format($this->cartOriginalTotal, 2) }}
                                    </span>
                                </div>

                                <div class="eg-cart-checkout__total d-flex align-items-center justify-content-between">
                                    <span>Discount</span>
                                    <div>
                                        <span style="color: green; font-weight: bold;">
                                            - PKR
                                            {{ number_format($this->cartOriginalTotal - $this->cartDiscountedTotal, 2) }}
                                        </span>
                                        {{-- <span>
                                            ({{ round((($this->cartOriginalTotal - $this->cartDiscountedTotal) / $this->cartOriginalTotal) * 100) }}%)
                                        </span> --}}
                                    </div>
                                </div>
                            @endif

                            <div class="eg-cart-checkout__total d-flex align-items-center justify-content-between">
                                <span><strong>Total</strong></span>
                                <span><strong>PKR {{ number_format($this->cartDiscountedTotal, 2) }}</strong></span>
                            </div>

                            <div class="eg-cart-checkout__proceed">
                                @if (empty($cartItems))
                                    <a href="javascript:void(0);"
                                        onclick="alert('Your cart is empty! Please add items before proceeding.')"
                                        class="eg-cart-checkout__btn eg-btn w-100">
                                        Proceed to Checkout
                                    </a>
                                @else
                                    <a href="{{ route('checkout') }}" class="eg-cart-checkout__btn eg-btn w-100">
                                        Proceed to Checkout
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cart-area-start -->

    </main>
