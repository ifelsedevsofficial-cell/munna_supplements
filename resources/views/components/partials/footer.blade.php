   <!-- footer area -->
   <footer class="scene fix">
       <div class="eg-newsletter__bg">
           <div class="container">
               <div class="eg-newsletter__wrap">
                   <div class="row align-items-center">
                       <div class="col-lg-6">
                           <div class="eg-newsletter__content">
                               <h4 class="eg-newsletter__title">MUNNA SUPPLEMENTS</h4>
                           </div>
                       </div>
                       <div class="col-lg-6">
                           <div class="eg-newsletter__form">
                               <form action="">

                                   <a class="eg-btn" href="{{ route('shop') }}">Products</a>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="eg-footer__bg theme-bg">
           <div class="eg-footer__main">
               <div class="container">
                   <div class="row align-items-center">
                       <div class="offset-lg-1 col-lg-4">
                           <div class="eg-footer__widget mb-35">
                               <div class="eg-footer__widget_link eg-line">
                                   <a href="{{ route('shop') }}">Products</a>
                                   <a href="{{ route('shop.about') }}">About</a>
                                   <a href="{{ route('shop.contact') }}">Contact</a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-2">
                           <div class="eg-footer__widget text-center mb-35">
                               <div class="eg-footer__widget_logo">
                                   <a href="{{ route('shop.home') }}">
                                       @if ($settings->site_logo)
                                           <img style="max-width:
                                    180px; max-height: 80px;"
                                               src="{{ asset('storage/' . $settings->site_logo) }}"
                                               alt="{{ $settings->site_name }} logo">
                                       @else
                                           <span
                                               style="color: white; font-size: 1.5rem; font-weight: bold;">{{ $settings->site_name }}</span>
                                       @endif
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-4">
                           {{-- <div class="eg-footer__widget text-lg-end mb-35">
                               <div class="eg-footer__widget_social">
                                   <a href=""><i class="fab fa-facebook-square"></i></a>
                                   <a href=""><i class="fab fa-twitter"></i></a>
                                   <a href=""><i class="fab fa-vimeo-v"></i></a>
                                   <a href=""><i class="fab fa-youtube"></i></a>
                               </div>
                           </div> --}}
                       </div>
                   </div>
               </div>
           </div>
           <div class="eg-footer__bottom">
               <div class="container">
                   <div class="eg-footer__bottom_border">
                       <div class="row">
                           <div class="offset-lg-1 col-lg-5">
                               <div class="eg-footer__copyright mb-30">
                                   <span>© Copyrights, 2025 <a href="https://ifelsedevs.com" target="_blank">IF Else
                                           Devs</a>.
                                       All Right Reserved</span>
                               </div>
                           </div>
                           <div class="col-lg-5">
                               <div class="eg-footer__terms eg-line text-lg-end mb-30">
                                   {{-- <a href="">Terms of Service</a> --}}
                                   {{-- <a href="">Privacy Policy</a> --}}
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <h4 class="eg-footer__opacity-text d-none d-lg-block">Stay With Us</h4>
           <div class="eg-footer__shape-1">
               <img class="layer" data-depth="0.3" src="{{ asset('assets/img/shape/footer-shape-02.png') }}"
                   alt="footer-shape">
           </div>
           <div class="eg-footer__shape-2 scene-y">
               <img class="layer" data-depth="3" src="{{ asset('assets/img/shape/footer-shape-03.png') }}"
                   alt="footer-shape">
           </div>
       </div>
   </footer>
   <!-- footer-area-end -->
