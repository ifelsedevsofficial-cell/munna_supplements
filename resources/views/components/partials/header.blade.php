<!-- header area start -->
<header class="header">
    <div id="header-sticky" class="menu-area eg-header__area eg-header__transparent">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="eg-header__mobile-toggler d-block d-xl-none">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="25" height="25" x="0" y="0"
                            viewBox="0 0 32 32" style="enable-background: new 0 0 512 512" xml:space="preserve"
                            class="">
                            <g>
                                <path
                                    d="M11.187 2.275H5a3.003 3.003 0 0 0-3 3v6.186a3.003 3.003 0 0 0 3 3h6.187a3.003 3.003 0 0 0 3-3V5.275a3.003 3.003 0 0 0-3-3zm1 9.186a1.001 1.001 0 0 1-1 1H5a1.001 1.001 0 0 1-1-1V5.275a1.001 1.001 0 0 1 1-1h6.187a1.001 1.001 0 0 1 1 1zM27 2.275h-6.187a3.003 3.003 0 0 0-3 3v6.186a3.003 3.003 0 0 0 3 3H27a3.003 3.003 0 0 0 3-3V5.275a3.003 3.003 0 0 0-3-3zm1 9.186a1.001 1.001 0 0 1-1 1h-6.187a1.001 1.001 0 0 1-1-1V5.275a1.001 1.001 0 0 1 1-1H27a1.001 1.001 0 0 1 1 1zM11.187 17.54H5a3.003 3.003 0 0 0-3 3v6.185a3.003 3.003 0 0 0 3 3h6.187a3.003 3.003 0 0 0 3-3V20.54a3.003 3.003 0 0 0-3-3zm1 9.185a1.001 1.001 0 0 1-1 1H5a1.001 1.001 0 0 1-1-1V20.54a1.001 1.001 0 0 1 1-1h6.187a1.001 1.001 0 0 1 1 1zM27 17.54h-6.187a3.003 3.003 0 0 0-3 3v6.185a3.003 3.003 0 0 0 3 3H27a3.003 3.003 0 0 0 3-3V20.54a3.003 3.003 0 0 0-3-3zm1 9.185a1.001 1.001 0 0 1-1 1h-6.187a1.001 1.001 0 0 1-1-1V20.54a1.001 1.001 0 0 1 1-1H27a1.001 1.001 0 0 1 1 1z"
                                    fill="#fff" data-original="#fff" class=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="eg-menu__wrap">
                        <nav class="eg-menu__nav d-flex align-items-centers justify-content-between">
                            <div class="eg-menu__main-menu d-none d-xl-flex align-items-center">
                                <ul class=" navigation">
                                    <li class="eg-menu__has-children">
                                        <a href="{{ route('shop.home') }}">Home
                                        </a>
                                    </li>
                                    <li class="eg-menu__has-children">
                                        <a href="{{ route('shop.about') }}">About
                                        </a>
                                    </li>
                                    <li class="eg-menu__has-children">
                                        <a href="{{ route('shop') }}">Products
                                        </a>
                                    </li>
                                    <li class="eg-menu__has-children">
                                        <a href="{{ route('shop.contact') }}">Contact</a>
                                    </li>
                                    <li> <a class="d-xl-none" href="{{ route('cart') }}">Cart</a></li>
                                    @auth
                                        <li class="d-xl-none"><a href="{{ route('orders') }}">My Orders</a></li>
                                        <li class="d-xl-none"><a href="{{ route('shop.logout') }}">Logout</a></li>
                                    @else
                                        <li class="d-xl-none"><a href="{{ route('shop.login') }}">Login</a></li>
                                        <li class="d-xl-none"><a href="{{ route('shop.register') }}">Signup</a></li>
                                    @endauth
                                    {{-- <li class="eg-menu__header-search" style="border-right: 0px">
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="24"
                                                height="24" x="0" y="0" viewBox="0 0 6.35 6.35"
                                                style="enable-background: new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="M2.894.511a2.384 2.384 0 0 0-2.38 2.38 2.386 2.386 0 0 0 2.38 2.384c.56 0 1.076-.197 1.484-.523l.991.991a.265.265 0 0 0 .375-.374l-.991-.992a2.37 2.37 0 0 0 .523-1.485C5.276 1.58 4.206.51 2.894.51zm0 .53c1.026 0 1.852.825 1.852 1.85S3.92 4.746 2.894 4.746s-1.851-.827-1.851-1.853.825-1.852 1.851-1.852z"
                                                        fill="#fff" data-original="#000000" class="">
                                                    </path>
                                                </g>
                                            </svg>
                                        </a>
                                    </li> --}}
                                    </li>
                                </ul>
                            </div>
                            <div class="eg-menu__logo">
                                <a href="{{ route('shop.home') }}">
                                    @if ($settings->site_logo)
                                        <img style="
                                        /* width: 120px; */
                                        height: 80px;
                                        "
                                            src="{{ asset('storage/' . $settings->site_logo) }}"
                                            alt="{{ $settings->site_name }} logo">
                                    @else
                                        <span
                                            style="color: white; font-size: 1.5rem; font-weight: bold;">{{ $settings->site_name }}</span>
                                    @endif
                                </a>
                            </div>
                            <div class="eg-menu__header-actions d-flex align-items-center">
                                <div class="d-none d-lg-block">
                                    <ul class="d-flex align-items-center">
                                        {{-- <li class="eg-menu__header-search">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="24"
                                                    height="24" x="0" y="0" viewBox="0 0 6.35 6.35"
                                                    style="enable-background: new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="M2.894.511a2.384 2.384 0 0 0-2.38 2.38 2.386 2.386 0 0 0 2.38 2.384c.56 0 1.076-.197 1.484-.523l.991.991a.265.265 0 0 0 .375-.374l-.991-.992a2.37 2.37 0 0 0 .523-1.485C5.276 1.58 4.206.51 2.894.51zm0 .53c1.026 0 1.852.825 1.852 1.85S3.92 4.746 2.894 4.746s-1.851-.827-1.851-1.853.825-1.852 1.851-1.852z"
                                                            fill="#fff" data-original="#000000" class="">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </li> --}}
                                        <li class="eg-menu__header-cart"> <a href="{{ route('cart') }}">
                                                <div x-data="{ cartCount: 0 }" x-init="// Update cart count and show toast on update
                                                window.addEventListener('cart-updated', e => {
                                                    cartCount = e.detail[0].count;

                                                    e.detail[0].showToast && Toastify({
                                                        text: e.detail[0].message || 'Cart updated.',
                                                        duration: 3000,
                                                        gravity: 'top',
                                                        position: 'right',
                                                        close: true,
                                                        style: {
                                                            background: 'linear-gradient(to right, #00b09b, #96c93d)',
                                                        }
                                                    }).showToast();
                                                });">
                                                    🛒 Cart: <span x-text="cartCount"></span> items
                                                </div>
                                            </a></li>
                                        <li class="eg-menu__header-user">
                                            <a href="javascript:void()">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="20"
                                                    height="20" x="0" y="0" viewBox="0 0 32 32"
                                                    style="enable-background: new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="M16 1c-4.415 0-8 3.585-8 8s3.585 8 8 8 8-3.585 8-8-3.585-8-8-8zm0 2c3.311 0 6 2.689 6 6s-2.689 6-6 6-6-2.689-6-6 2.689-6 6-6zM31 27.49a5.003 5.003 0 0 0-1.523-3.595l-.005-.005C27.518 22.026 23.264 19 16 19c-7.266 0-11.52 3.027-13.469 4.896l-.004.004a4.996 4.996 0 0 0-1.522 3.58C1 27.646 1 27.823 1 28c0 .796.316 1.559.879 2.121A2.996 2.996 0 0 0 4 31h24c.796 0 1.559-.316 2.121-.879A2.996 2.996 0 0 0 31 28zm-2-.001V28a.997.997 0 0 1-1 1H4a.997.997 0 0 1-1-1l.005-.51c0-.811.329-1.588.912-2.152C5.665 23.663 9.493 21 16 21s10.335 2.663 12.088 4.334c.583.566.912 1.343.912 2.155z"
                                                            fill="current" data-original="#000000"></path>
                                                    </g>
                                                </svg>
                                                <span class="user">My Account
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        width="24" height="24" x="0" y="0" viewBox="0 0 24 24"
                                                        style="enable-background: new 0 0 512 512" xml:space="preserve"
                                                        class="">
                                                        <g>
                                                            <path fill="current"
                                                                d="M5.97 8.47a.75.75 0 0 1 1.06 0l5.47 5.47 5.47-5.47a.75.75 0 1 1 1.06 1.06l-6 6a.75.75 0 0 1-1.06 0l-6-6a.75.75 0 0 1 0-1.06z"
                                                                data-original="#000000"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                            <ul class="eg-menu__signUp">
                                                @auth
                                                    <li> <a href="{{ route('cart') }}">Cart</a></li>
                                                    <li> <a href="{{ route('orders') }}">My Orders</a></li>
                                                    <li> <a href="{{ route('shop.logout') }}">logout</a></li>
                                                @else
                                                    <li> <a href="{{ route('shop.login') }}">Login</a> </li>
                                                    <li> <a href="{{ route('shop.register') }}">Singup</a></li>
                                                @endauth
                                            </ul>
                                        </li>
                                        <li class="eg-menu__header-offCanvas-btn d-none d-xl-block">
                                            <button type="button" class="hamburger-btn offcanvas-open-btn">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="eg-mobile__menu">
                        <nav class="eg-mobile__menu-box">
                            <div class="eg-mobile__menu-top d-flex justify-content-between align-items-center">
                                <div class="eg-mobile__logo">
                                    <a href="{{ route('shop.home') }}">
                                        @if ($settings->site_logo)
                                            <img style="max-width:
                                    80px; max-height: 80px;"
                                                src="{{ asset('storage/' . $settings->site_logo) }}"
                                                alt="{{ $settings->site_name }} logo">
                                        @else
                                            <span
                                                style="color: white; font-size: 1.5rem; font-weight: bold;">{{ $settings->site_name }}</span>
                                        @endif
                                    </a>
                                </div>
                                <div class="eg-mobile__close-btn">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="eg-mobile__menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            {{-- <div class="eg-header__offCanvas-social mt-40">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div> --}}
                        </nav>
                    </div>
                    <div class="eg-mobile__menu-backdrop"></div>
                    <!-- End Mobile Menu -->

                    <!-- header-search -->
                    <div class="eg-header__search-popup" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="eg-header__search-wrap text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div
                                            class="eg-mobile__menu-top heading-search d-flex justify-content-between align-items-center">
                                            <div class="eg-mobile__logo logo">
                                                <a href="{{ asset('shop.home') }}">
                                                    @if ($settings->site_logo)
                                                        <img style="max-width:
                                    80px; max-height: 80px;"
                                                            src="{{ asset('storage/' . $settings->site_logo) }}"
                                                            alt="{{ $settings->site_name }} logo">
                                                    @else
                                                        <span
                                                            style="color: white; font-size: 1.5rem; font-weight: bold;">{{ $settings->site_name }}</span>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="eg-mobile__close-btn search-close">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        </div>
                                        <div class="eg-header__search-form position-relative mt-150">
                                            <form action="{{ route('shop') }}">
                                                <input type="text" name="query"
                                                    placeholder="Enter your keyword...">
                                                <button type="submit" class="eg-header__search-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        width="30" height="30" x="0" y="0"
                                                        viewBox="0 0 6.35 6.35"
                                                        style="enable-background: new 0 0 512 512"
                                                        xml:space="preserve" class="">
                                                        <g>
                                                            <path
                                                                d="M2.894.511a2.384 2.384 0 0 0-2.38 2.38 2.386 2.386 0 0 0 2.38 2.384c.56 0 1.076-.197 1.484-.523l.991.991a.265.265 0 0 0 .375-.374l-.991-.992a2.37 2.37 0 0 0 .523-1.485C5.276 1.58 4.206.51 2.894.51zm0 .53c1.026 0 1.852.825 1.852 1.85S3.92 4.746 2.894 4.746s-1.851-.827-1.851-1.853.825-1.852 1.851-1.852z"
                                                                fill="current" data-original="#000000"> </path>
                                                        </g>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="eg-header__search-backdrop"></div>
                    <!-- header-search-end -->

                    <!-- offCanvas-start -->
                    <div class="eg-header__offCanvas-wrap">
                        <div class="eg-header__offCanvas-toggle">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="eg-header__offCanvas-body">
                            <div class="eg-header__offCanvas-content mb-60">
                                <h3 class="eg-header__offCanvas-title">
                                    Fuel your body with <span>Munna Supplements</span> —
                                    because true performance starts with the right nutrition.
                                </h3>
                                <p>
                                    At Munna Supplements, we believe in empowering your fitness goals
                                    with premium, authentic, and science-backed products. From protein to vitamins,
                                    we make sure you get the nutrients your body truly needs to perform and recover
                                    better.
                                </p>
                            </div>
                            <div class="eg-header__offCanvas-contact">
                                <h4 class="number mb-5">
                                    <a href="tel:+923402501290">+92 340 2501290</a>
                                </h4>
                                <h4 class="email mb-20">
                                    <a href="mailto:info@munnasupplements.com">munnasupplements@gmail.com</a>
                                </h4>
                                <p>
                                    Munna Supplements, Shah Latif Town <br>
                                    Karachi, Pakistan
                                </p>
                                <div class="eg-header__offCanvas-social mt-20">
                                    <a href="https://www.facebook.com/share/17A1YxHuHZ/"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <!--<a href="#"><i class="fab fa-twitter"></i></a>-->
                                    <!--<a href="#"><i class="fab fa-linkedin"></i></a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="eg-header__offCanvas-overlay"></div>

                    <!-- offCanvas-end -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->
