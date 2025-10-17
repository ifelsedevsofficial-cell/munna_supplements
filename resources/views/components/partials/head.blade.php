 <meta charset="utf-8">
 <meta http-equiv="x-ua-compatible" content="ie=edge">

 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <title>{{ $title ?? $settings->site_name }}</title>
 <meta name="description" content="">

 <!-- Place favicon.ico in the root directory -->
 <link rel="shortcut icon" type="image/x-icon" src="{{ asset('storage/' . $settings->site_logo) }}">

 <meta name="description"
     content="{{ $description ?? 'Munna Supplements offers high-quality supplements for fitness, muscle growth, weight loss, and overall health. Shop trusted products and boost your performance today.' }}">

 <meta name="keywords"
     content="Munna Supplements, fitness supplements, protein powder, vitamins, pre-workout, post-workout, muscle growth, health products, Pakistan supplements">

 <!-- Open Graph / Facebook -->
 <meta property="og:type" content="website">
 <meta property="og:url" content="{{ url()->current() }}">
 <meta property="og:title" content="{{ $title ?? 'Munna Supplements - Premium Health & Fitness Products' }}">
 <meta property="og:description"
     content="{{ $description ?? 'Explore trusted supplements for fitness, muscle growth, and health from Munna Supplements.' }}">
 <meta property="og:image" content="{{ asset('storage/' . $settings->site_logo) }}">

 <!-- Twitter -->
 <meta name="twitter:card" content="summary_large_image">
 <meta name="twitter:url" content="{{ url()->current() }}">
 <meta name="twitter:title" content="{{ $title ?? 'Munna Supplements - Premium Health & Fitness Products' }}">
 <meta name="twitter:description"
     content="{{ $description ?? 'Explore trusted supplements for fitness, muscle growth, and health from Munna Supplements.' }}">
 <meta name="twitter:image" content="{{ asset('storage/' . $settings->site_logo) }}">

 <!-- Canonical -->
 <link rel="canonical" href="{{ url()->current() }}">


 <!-- CSS here -->
 <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/css/flaticon_s.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

 <style>
     body {
         overflow-x: hidden;
     }

     .eg-product__price-old {
         color: #e53935;
         /* faded gray */
         font-size: 0.9rem;
     }

     .eg-product_card_price-old {
         color: #e53935;
     }

     .eg-product__price-new {
         color: #888;
         /* bold red */
         font-weight: 700;
         font-size: 1.1rem;
     }

     .eg-product__badge {
         background: #e53935;
         color: #fff;
         padding: 2px 6px;
         border-radius: 4px;
         font-size: 0.75rem;
         font-weight: 600;
     }

     .eg-product-details__price .current-price {
         font-size: 1.5rem;
         /* main focus */
         font-weight: 700;
         color: #222;
     }

     .eg-product-details__price .original-price {
         font-size: 0.95rem;
         /* smaller */
         color: #888;
         text-decoration: line-through;
     }

     .eg-product-details__price .discount-badge {
         background: #e63946;
         /* strong attention color */
         color: #fff;
         font-size: 0.8rem;
         font-weight: 600;
         padding: 2px 6px;
         border-radius: 4px;
         text-transform: uppercase;
     }

     .floating-whatsapp {
         position: fixed;
         bottom: 20px;
         left: 20px;
         background-color: #25D366;
         border-radius: 50%;
         padding: 15px;
         box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
         z-index: 9999;
         transition: transform 0.3s ease;
     }


     .floating-whatsapp:hover {
         transform: scale(1.1);
     }

     .eg-order__wrapper {
         margin-inline: 100px !important;
         /* default for large screens */
     }

     @media (max-width: 992px) {
         .eg-order__wrapper {
             margin-inline: 30px !important;
             /* medium devices (tablet) */
         }
     }

     @media (max-width: 576px) {
         .eg-order__wrapper {
             margin-inline: 10px !important;
             /* small devices (mobile) */
         }

         .floating-whatsapp {
             bottom: 50px;
         }
     }

     .eg-breadcrumb__area {
         position: relative;
         overflow: hidden;
         /* Prevent shape or circle overflow */
     }

     .eg-breadcrumb__shape img,
     .eg-banner__circle-1 {
         max-width: 100%;
         height: auto;
     }

     .scene,
     .scene-y {
         overflow: hidden;
     }

     body {
         overflow-x: hidden;
         /* Kill any global horizontal scrollbar */
     }

     .mobile-category-dropdown {
         padding: 0 10px;
     }

     .category-select {
         width: 100%;
         border-radius: 12px;
         border: 1px solid #ddd;
         padding: 10px 14px;
         font-size: 16px;
         background-color: #fff;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
         appearance: none;
         background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M6 8L0 0h12L6 8z' fill='%23333'/%3E%3C/svg%3E");
         background-repeat: no-repeat;
         background-position: right 14px center;
         background-size: 12px;
     }

     .category-select:focus {
         border-color: #222;
         box-shadow: 0 0 0 3px rgba(34, 34, 34, 0.1);
         outline: none;
     }

     .eg-product__item {
         background: #fff;
         border-radius: 12px;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
         height: 100%;
         display: flex;
         flex-direction: column;
         justify-content: space-between;
         transition: transform 0.3s ease;
         padding: 16px;
     }

     .eg-product__item:hover {
         transform: translateY(-5px);
     }

     .eg-product__thumb {
         width: 100%;
         height: 230px;
         display: flex;
         align-items: center;
         justify-content: center;
         overflow: hidden;
         border-radius: 10px;
         background: #fafafa;
     }

     .eg-product__thumb img {
         width: 100%;
         height: 100%;
         object-fit: contain;
         transition: transform 0.3s ease;
     }

     .eg-product__thumb img:hover {
         transform: scale(1.05);
     }

     .eg-product__title a {
         color: #222;
         font-weight: 600;
         text-decoration: none;
     }

     .eg-product__title a:hover {
         color: #d32a36;
     }

     .eg-product__price-new {
         font-weight: 700;
         font-size: 18px;
         color: #d32a36;
     }

     /* Buttons */
     .eg-product__btns button {
         border: none;
         outline: none;
         font-size: 14px;
         padding: 8px 14px;
         border-radius: 8px;
         cursor: pointer;
         font-weight: 600;
         transition: all 0.3s ease;
     }

     .btn-cart {
         background-color: #222;
         color: #fff;
     }

     .btn-cart:hover {
         background-color: #d32a36;
     }

     /* Discount Badge */
     .eg-product__badge {
         position: absolute;
         top: 10px;
         right: 10px;
         background: #d32a36;
         color: #fff;
         font-size: 12px;
         font-weight: 600;
         padding: 5px 8px;
         border-radius: 6px;
         z-index: 5;
     }

     /* Buy Now Button */
     .btn-buy {
         background-color: #d32a36;
         color: #fff;
     }

     .btn-buy:hover {
         background-color: #b0252f;
     }


     /* Responsive Grid Adjustments */
     @media (max-width: 576px) {
         .eg-product__thumb {
             height: 180px;
         }
     }

     css for search bar

     /* Inline expanding search box */
     .eg-menu__header-search {
         position: relative;
     }

     .search-box {
         position: absolute;
         top: 50%;
         right: 0;
         transform: translateY(-50%) scaleX(0);
         transform-origin: right;
         opacity: 0;
         transition: all 0.3s ease;
         background: #fff;
         border-radius: 6px;
         display: flex;
         align-items: center;
         overflow: hidden;
         box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
         z-index: 99;
     }

     .search-box.active {
         transform: translateY(-50%) scaleX(1);
         opacity: 1;
     }

     .search-box input {
         border: none;
         outline: none;
         padding: 8px 12px;
         width: 180px;
         font-size: 14px;
     }

     .search-box .search-btn {
         background: #d32a36;
         border: none;
         color: #fff;
         padding: 8px 10px;
         cursor: pointer;
         display: flex;
         align-items: center;
         justify-content: center;
     }

     .search-toggle svg {
         transition: transform 0.3s ease;
     }

     .search-toggle:hover svg {
         transform: scale(1.1);
     }

     /* Mobile adjustments */
     @media (max-width: 576px) {
         .search-box input {
             width: 130px;
             font-size: 13px;
         }
     }
 </style>

 @if (request()->routeIs('product'))
     <style>
         @media (max-width: 575px) {
             .eg-product-details__button .eg-btn {
                 margin-top: 0px;
             }
         }
     </style>
 @endif
