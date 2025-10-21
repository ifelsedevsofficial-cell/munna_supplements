 <main class="fix">

     <!-- breadcrumb-area-start -->
     <section class="eg-breadcrumb__area theme-bg mb-130 p-relative z-index-1 scene d-none d-md-block">
         <div class="eg-breadcrumb">
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-lg-12">
                         <div class="">
                             <div class="eg-breadcrumb__title-opacity d-flex justify-content-center">
                                 <h2 class="title">About</h2>
                             </div>
                         </div>
                         <div class="eg-breadcrumb__content">
                             <h2 class="title">About</h2>
                             <nav aria-label="breadcrumb">
                                 <ol class="eg-breadcrumb__list">
                                     <li class="eg-breadcrumb__item"><a href="{{ asset('home') }}">Home</a></li>
                                     <li class="eg-breadcrumb__item active" aria-current="page">About</li>
                                 </ol>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="eg-banner__circle-1"></div>
             <div class="eg-breadcrumb__shape one">
                 <img class="layer" data-depth="0.3" src="{{ asset('assets/img/banner/banner-shape-01.png') }}"
                     alt="img">
             </div>
             <div class="eg-breadcrumb__shape two scene-y">
                 <img class="layer" data-depth="3" src="{{ asset('assets/img/banner/banner-shape-02.png') }}"
                     alt="shape">
             </div>
             <div class="eg-breadcrumb__shape three">
                 <img class="layer" data-depth="0.3" src="{{ asset('assets/img/banner/banner-shape-03.png') }}"
                     alt="shape">
             </div>
             <div class="eg-breadcrumb__shape four">
                 <img class="layer" data-depth="0.3" src="{{ asset('assets/img/banner/banner-shape-04.png') }}"
                     alt="shape">
             </div>
         </div>
     </section>
     <!-- breadcrumb-area-start -->

     <!-- about content -->
     <section class="eg-about__area mb-120">
         <x-partials.box />
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-md-6 mb-4">
                     <img src="{{ asset('storage/' . $settings->site_logo) }}" alt="{{ $settings->site_name }} logo"
                         class="img-fluid rounded-3 shadow">
                 </div>
                 <div class="col-md-6">
                     <h3 class="mb-3">Welcome to Munna Supplements</h3>
                     <p>
                         At Munna Supplements, we believe in empowering your fitness goals
                         with premium, authentic, and science-backed products. From protein to vitamins,
                         we make sure you get the nutrients your body truly needs to perform and recover
                         better.
                     </p>
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
                     {{-- <p>
                         From whey protein to essential vitamins, we ensure every product
                         meets international standards of safety and effectiveness.
                         With Supex, your journey to a healthier lifestyle is supported
                         by quality, reliability, and care.
                     </p>
                     <ul class="list-unstyled">
                         <li>✔ 100% Authentic Supplements</li>
                         <li>✔ Trusted by Athletes and Trainers</li>
                         <li>✔ Fast & Reliable Delivery</li>
                     </ul> --}}
                 </div>
             </div>
         </div>
     </section>

 </main>
