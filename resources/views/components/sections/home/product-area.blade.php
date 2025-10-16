@props(['products', 'category'])
<!-- product area -->
<section id="product" class="product__area eg-product__bg fix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="eg-section text-center">
                    <h2 class="eg-section__title">{{ $category->name }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" wire:ignore>
        <div class="swiper-container eg-product__active">
            <div class="swiper-wrapper">
                @foreach ($category->products as $product)
                    <x-page-components.product :product="$product" />
                @endforeach
            </div>
            <div class="eg-product__arrow">
                <div class="eg-product__next">
                    <span>
                        <svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.7071 8.70711C21.0976 8.31658 21.0976 7.68342 20.7071 7.2929L14.3431 0.928933C13.9526 0.538409 13.3195 0.538409 12.9289 0.928933C12.5384 1.31946 12.5384 1.95262 12.9289 2.34315L18.5858 8L12.9289 13.6569C12.5384 14.0474 12.5384 14.6805 12.9289 15.0711C13.3195 15.4616 13.9526 15.4616 14.3431 15.0711L20.7071 8.70711ZM-8.74228e-08 9L20 9L20 7L8.74228e-08 7L-8.74228e-08 9Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                </div>
                <div class="eg-product__prev">
                    <span>
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.04083 7.18205C0.650309 7.57258 0.650309 8.20574 1.04083 8.59627L7.40479 14.9602C7.79532 15.3508 8.42848 15.3508 8.81901 14.9602C9.20953 14.5697 9.20953 13.9365 8.81901 13.546L3.16215 7.88916L8.81901 2.23231C9.20953 1.84178 9.20953 1.20862 8.81901 0.818092C8.42848 0.427568 7.79532 0.427568 7.40479 0.818092L1.04083 7.18205ZM21.5183 6.88916L1.74794 6.88916V8.88916L21.5183 8.88916V6.88916Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product area end -->
