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

