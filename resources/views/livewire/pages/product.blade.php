<main class="fix" wire:ignore>
    <!-- breadcrumb-area-start -->
    <section class="eg-breadcrumb__area theme-bg mb-130 p-relative z-index-1 scene">
        <div class="eg-breadcrumb">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="eg-breadcrumb__title-opacity d-flex justify-content-center">
                            <h2 class="title">Product Detail</h2>
                        </div>
                        <div class="eg-breadcrumb__content">
                            <h2 class="title"> Product Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="eg-breadcrumb__list">
                                    <li class="eg-breadcrumb__item"><a href="{{ route('shop') }}">Products</a></li>
                                    <li class="eg-breadcrumb__item active" aria-current="page">{{ $product->name }}</li>
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

    <!-- product-single-start -->
    <section class="eg-product-single__area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div x-data="{
                        activeImage: '{{ asset('storage/' . $product->image) }}',
                        images: [
                            '{{ asset('storage/' . $product->image) }}',
                            @if (!empty($product->images)) @foreach ($product->images as $image)
                    '{{ asset('storage/' . $image) }}',
                @endforeach @endif
                        ]
                    }" class="eg-product-details__thumb-tab mb-10">
                        <!-- Main Image Display -->
                        <div class="eg-product-details__thumb-content w-img mb-5">
                            <img x-show="activeImage" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100" :src="activeImage"
                                class="mx-auto rounded-xl shadow-md" :src="activeImage" alt="Product image"
                                class="mx-auto rounded-xl shadow-md transition-all duration-300"
                                style="max-height: 600px; max-width: 600px;">
                        </div>

                        <!-- Thumbnails -->
                        <div class="eg-product-details__thumb-nav mt-3 flex flex-wrap justify-center gap-3">
                            <template x-for="(image, index) in images" :key="index">
                                <img :src="image" @click="activeImage = image"
                                    class="cursor-pointer border-2 rounded-lg transition-all duration-200"
                                    :class="activeImage === image ? 'border-blue-500 opacity-100' :
                                        'border-transparent opacity-70 hover:opacity-100'"
                                    style="margin: 6px; height: 100px; width: 100px; object-fit: cover; cursor: pointer;"
                                    alt="Thumbnail">
                            </template>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="eg-product-details__wrapper">
                        <div class="eg-product-details__content">
                            <h3 class="eg-product-details__title">{{ $product->name }}</h3>
                            <div class="eg-product-details__stock d-flex align-items-center mt-20 mb-20">
                                <button class="stock mr-15">
                                    @if ($product->stock > 0)
                                        in stock : {{ $product->stock }}
                                    @else
                                        Out of stock
                                    @endif
                                </button>
                                {{-- <div class="eg-product-details__rating">
                                    <span><img src="assets/img/icon/rating-star.svg" alt="rating-star"></span>
                                    <span><img src="assets/img/icon/rating-star.svg" alt="rating-star"></span>
                                    <span><img src="assets/img/icon/rating-star.svg" alt="rating-star"></span>
                                    <span><img src="assets/img/icon/rating-star.svg" alt="rating-star"></span>
                                    <span><img src="assets/img/icon/rating-star.svg" alt="rating-star"></span>
                                    <span class="eg-product-details__rating-count ml-5">(38)</span>
                                </div> --}}
                            </div>
                            @if (Str::length($product->description) > 300)
                                <div x-data="{ expanded: false }">
                                    <div x-show="!expanded">
                                        {!! Str::limit($product->description, 300) !!}
                                        <a href="#" @click.prevent="expanded = true"
                                            style="font-size: 18px; color: skyblue; text-decoration: underline;">see more</a>
                                    </div>
                                    <div x-show="expanded">
                                        {!! $product->description !!}
                                        <a href="#" @click.prevent="expanded = false"
                                            style="font-size: 18px; color: skyblue; text-decoration: underline;">see less</a>
                                    </div>
                                </div>
                            @else
                                {!! $product->description !!}
                            @endif
                            <div class="eg-product-details__price mt-30">
                                <h4 class="eg-product-details__amount d-flex align-items-center">
                                    <span class="current-price">
                                        PKR {{ number_format($product->discounted_price, 2) }}
                                    </span>

                                    @if ($product->original_price > $product->discounted_price)
                                        <span class="original-price ms-2 eg-product_card_price-old">
                                            PKR {{ number_format($product->original_price, 2) }}
                                        </span>
                                        <span class="discount-badge ms-2">
                                            {{ round((($product->original_price - $product->discounted_price) / $product->original_price) * 100) }}%
                                            OFF
                                        </span>
                                    @endif
                                </h4>
                            </div>


                        </div>
                        <div class="eg-product-details__quantity d-flex align-items-center mb-30 mt-30">
                            {{-- <h4 class="eg-product-details__quantity-title">QUANTITY</h4>
                            <div class="eg-product-details__quantity-box">
                                <button wire:click="dec" type="button"
                                    class="eg-product-details__quantity-btn minus decrement"><i
                                        class="fa fa-minus"></i></button>
                                <span class="counter">1</span>
                                <button wire:click="inc" type="button"
                                    class="eg-product-details__quantity-btn plus increment"><i
                                        class="fa fa-plus"></i></button>
                            </div> --}}
                            <div class="eg-product-details__button d-flex align-items-center justify-content-center">
                                <a wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled"
                                    class="eg-product__cart mr-15" style="cursor: pointer;">
                                    <span><img src="{{ asset('assets/img/icon/cart.svg') }}" alt=""></span>
                                </a>
                                <a style="margin-left: 0px" class="eg-btn"
                                    wire:click="addToCartAndRedirect({{ $product->id }})">Buy Now</a>
                            </div>
                        </div>
                        <div class="eg-product-details__bottom mb-30">
                            {{-- <div class="eg-product-details__sku">
                                <b>sku :</b><span>QZX8VGA</span>
                            </div> --}}
                            <div class="eg-product-details__categories">
                                <b>Category :</b>
                                <span>
                                    {{-- <a href="{{ route('shop', ['category_id' => $product->subCategory->category->id ?? 0]) }}"
                                        title="Browse more {{ $product->subCategory->category?->name ?? 'Category' }}">
                                        {{ $product->subCategory->category?->name ?? 'Category' }}
                                    </a>
                                    &nbsp;|&nbsp; --}}
                                    <a href="{{ route('shop', ['sub_category_id' => $product->subCategory->id ?? 0]) }}"
                                        title="Browse more {{ $product->subCategory->name ?? 'Subcategory' }}">
                                        {{ $product->subCategory->name ?? 'Subcategory' }}
                                    </a>
                                </span>
                            </div>
                            {{-- <div class="eg-product-details__tags">
                                <b>Tags :</b>
                                <a href="shop-details.html#">Food,</a>
                                <a href="shop-details.html#">Organic</a>
                            </div> --}}
                        </div>
                        {{-- <div class="eg-product-details__socials d-flex align-items-center">
                            <h4 class="eg-product-details__socials-title">Share with friends</h4>
                            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                            <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
                            <a href="https://pinterest.com"><i class="fab fa-pinterest-p"></i></a>
                            <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="eg-review__wrap mt-50">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="eg-review__wrapper">
                            <ul class="nav nav-pills mb-40" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Descriptions</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Reviews</button>
                                </li> --}}
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab" tabindex="0">
                                    <div>
                                        <p>{!! $product->description !!}</p>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab" tabindex="0">
                                    <div class="postbox-comment-wrapper">
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-10">
                                                <div class="eg-postbox__comment eg-review__box">
                                                    <ul class="mb-60">
                                                        <li>
                                                            <div
                                                                class="eg-postbox__comment-box d-flex align-items-center">
                                                                <div class="eg-postbox__comment-avater">
                                                                    <img src="assets/img/blog/blog-comment-01.png"
                                                                        alt="">
                                                                </div>
                                                                <div class="eg-postbox__comment-content">
                                                                    <div
                                                                        class="eg-postbox__comment-header mb-5 d-flex justify-content-between">
                                                                        <div class="eg-postbox__comment-author">
                                                                            <p class="eg-postbox__comment-name">Jared
                                                                                Smith</p>
                                                                            <span
                                                                                class="eg-postbox__comment-meta">February
                                                                                13, 2023</span>
                                                                        </div>
                                                                        <div class="eg-postbox__comment-reply">
                                                                            <span><img
                                                                                    src="assets/img/icon/rating-star.svg"
                                                                                    alt="rating-star"></span>
                                                                            <span><img
                                                                                    src="assets/img/icon/rating-star.svg"
                                                                                    alt="rating-star"></span>
                                                                            <span><img
                                                                                    src="assets/img/icon/rating-star.svg"
                                                                                    alt="rating-star"></span>
                                                                            <span><img
                                                                                    src="assets/img/icon/rating-star.svg"
                                                                                    alt="rating-star"></span>
                                                                            <span><img
                                                                                    src="assets/img/icon/rating-star.svg"
                                                                                    alt="rating-star"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p> As a small business owner, I need to stay
                                                                        organized and keep track of a lot of moving
                                                                        parts.
                                                                        That's why I was thrilled to discover GOCO, With
                                                                        its robust project management features.</p>
                                                                </div>
                                                            </div>
                                                            <ul class="children mt-45">
                                                                <li>
                                                                    <div
                                                                        class="eg-postbox__comment-box d-flex align-items-center">
                                                                        <div class="eg-postbox__comment-avater">
                                                                            <img src="assets/img/blog/blog-comment-02.png"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="eg-postbox__comment-content">
                                                                            <div
                                                                                class="eg-postbox__comment-header mb-5 d-flex justify-content-between">
                                                                                <div
                                                                                    class="eg-postbox__comment-author">
                                                                                    <p
                                                                                        class="eg-postbox__comment-name">
                                                                                        John Boyega</p>
                                                                                    <span
                                                                                        class="eg-postbox__comment-meta">February
                                                                                        15, 2023</span>
                                                                                </div>
                                                                                <div class="eg-postbox__review">
                                                                                    <span><img
                                                                                            src="assets/img/icon/rating-star.svg"
                                                                                            alt="rating-star"></span>
                                                                                    <span><img
                                                                                            src="assets/img/icon/rating-star.svg"
                                                                                            alt="rating-star"></span>
                                                                                    <span><img
                                                                                            src="assets/img/icon/rating-star.svg"
                                                                                            alt="rating-star"></span>
                                                                                    <span><img
                                                                                            src="assets/img/icon/rating-star.svg"
                                                                                            alt="rating-star"></span>
                                                                                    <span><img
                                                                                            src="assets/img/icon/rating-star.svg"
                                                                                            alt="rating-star"></span>
                                                                                </div>
                                                                            </div>
                                                                            <p> I've always struggled with staying
                                                                                motivated when it comes to fitness, but
                                                                                GOCO has changed everything. The app's
                                                                                personalized workout plans and
                                                                                easy-to-follow.</p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="eg-postbox__form eg-review__box">
                                                    <div class="eg-postbox__form-text">
                                                        <h4 class="eg-postbox__title">Leave A Review</h4>
                                                        <span>Your email address will not be published. Required fields
                                                            are marked *</span>
                                                    </div>
                                                    <div class="eg-review__rating mt-25 mb-25">
                                                        <span>Your Rating *</span>
                                                        <div class="eg-review__rating-icon">
                                                            <span>
                                                                <svg width="24" height="23"
                                                                    viewBox="0 0 24 23" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.9999 18.26L4.94691 22.208L6.52191 14.28L0.586914 8.792L8.61391 7.84L11.9999 0.5L15.3859 7.84L23.4129 8.792L17.4779 14.28L19.0529 22.208L11.9999 18.26ZM11.9999 15.968L16.2469 18.345L15.2979 13.572L18.8709 10.267L14.0379 9.694L11.9999 5.275L9.96191 9.695L5.12891 10.267L8.70191 13.572L7.75291 18.345L11.9999 15.968Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <span>
                                                                <svg width="24" height="23"
                                                                    viewBox="0 0 24 23" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.9999 18.26L4.94691 22.208L6.52191 14.28L0.586914 8.792L8.61391 7.84L11.9999 0.5L15.3859 7.84L23.4129 8.792L17.4779 14.28L19.0529 22.208L11.9999 18.26ZM11.9999 15.968L16.2469 18.345L15.2979 13.572L18.8709 10.267L14.0379 9.694L11.9999 5.275L9.96191 9.695L5.12891 10.267L8.70191 13.572L7.75291 18.345L11.9999 15.968Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <span>
                                                                <svg width="24" height="23"
                                                                    viewBox="0 0 24 23" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.9999 18.26L4.94691 22.208L6.52191 14.28L0.586914 8.792L8.61391 7.84L11.9999 0.5L15.3859 7.84L23.4129 8.792L17.4779 14.28L19.0529 22.208L11.9999 18.26ZM11.9999 15.968L16.2469 18.345L15.2979 13.572L18.8709 10.267L14.0379 9.694L11.9999 5.275L9.96191 9.695L5.12891 10.267L8.70191 13.572L7.75291 18.345L11.9999 15.968Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <span>
                                                                <svg width="24" height="23"
                                                                    viewBox="0 0 24 23" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.9999 18.26L4.94691 22.208L6.52191 14.28L0.586914 8.792L8.61391 7.84L11.9999 0.5L15.3859 7.84L23.4129 8.792L17.4779 14.28L19.0529 22.208L11.9999 18.26ZM11.9999 15.968L16.2469 18.345L15.2979 13.572L18.8709 10.267L14.0379 9.694L11.9999 5.275L9.96191 9.695L5.12891 10.267L8.70191 13.572L7.75291 18.345L11.9999 15.968Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <span>
                                                                <svg width="24" height="23"
                                                                    viewBox="0 0 24 23" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.9999 18.26L4.94691 22.208L6.52191 14.28L0.586914 8.792L8.61391 7.84L11.9999 0.5L15.3859 7.84L23.4129 8.792L17.4779 14.28L19.0529 22.208L11.9999 18.26ZM11.9999 15.968L16.2469 18.345L15.2979 13.572L18.8709 10.267L14.0379 9.694L11.9999 5.275L9.96191 9.695L5.12891 10.267L8.70191 13.572L7.75291 18.345L11.9999 15.968Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="eg-postbox__form-wrapper mt-25">
                                                        <form action="shop-details.html#">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="eg-postbox__form-input mb-20">
                                                                        <label for="name"> Name </label>
                                                                        <input type="text" id="name"
                                                                            placeholder="lawsan Dowson"
                                                                            required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="eg-postbox__form-input mb-20">
                                                                        <label for="email"> email </label>
                                                                        <input type="email" id="email"
                                                                            placeholder="alma.lawson@example.com"
                                                                            required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="eg-postbox__form-input message mb-20">
                                                                        <label for="message"> message </label>
                                                                        <textarea name="message" id="message" placeholder="Write Your Review" spellcheck="false"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div
                                                                        class="eg-postbox__form-checkbox d-flex mb-20 eg-checkout__check-box">
                                                                        <input class="mr-10" type="checkbox"
                                                                            id="checkbox">
                                                                        <label for="checkbox">Save my name, email, and
                                                                            website in this browser for the next time I
                                                                            comment.</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit"
                                                                class="eg-postbox__form-btn eg-btn">
                                                                Post Your Review
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        version="1.1" width="20" height="20"
                                                                        x="0" y="0" viewBox="0 0 24 24"
                                                                        style="enable-background: new 0 0 512 512"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <path
                                                                                d="M9 20a1 1 0 0 1-.707-1.707L14.586 12 8.293 5.707a1 1 0 0 1 1.414-1.414l7 7a1 1 0 0 1 0 1.414l-7 7A1 1 0 0 1 9 20z"
                                                                                data-original="#000000"></path>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-single-end -->

    <!-- product area -->
    <section class="product__area eg-product__bg fix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="eg-section text-center">
                        <h2 class="eg-section__title mb-60">Similar Products</h2>
                    </div>
                </div>
            </div>
            <div class="swiper-container eg-product-3__active">
                <div class="swiper-wrapper">
                    @foreach ($relatedProducts as $product)
                        <div class="swiper-slide text-center mb-50 mt-50" wire:key="product-{{ $product->id }}">
                            <article class="eg-product__item text-center" itemscope
                                itemtype="https://schema.org/Product">
                                <div class="eg-product__thumb">
                                    <a href="{{ route('product', ['id' => $product->id, 'name' => Illuminate\Support\Str::slug($product->name)]) }}"
                                        title="View details of {{ $product->name }}">
                                        <img src="{{ asset("storage/$product->image") }}"
                                            alt="{{ $product->name }} - Buy Online at Best Price in Pakistan"
                                            style="max-width:200px; max-height:200px;" loading="lazy"
                                            itemprop="image">
                                    </a>
                                </div>

                                <div class="eg-product__content">
                                    <!-- Product name -->
                                    <h2 class="eg-product__title" itemprop="name">
                                        <a href="{{ route('product', ['id' => $product->id, 'name' => Illuminate\Support\Str::slug($product->name)]) }}"
                                            title="Buy {{ $product->name }} Online in Pakistan">
                                            {{ $product->name }}
                                        </a>
                                    </h2>

                                    <!-- Category -->
                                    <h3 class="eg-product__category" style="font-size: small;">
                                        <span>
                                            {{-- <a href="{{ route('shop', ['category_id' => $product->subCategory->category->id ?? 0]) }}"
                                                title="Browse more {{ $product->subCategory->category?->name ?? 'Category' }}">
                                                {{ $product->subCategory->category?->name ?? 'Category' }}
                                            </a>
                                            &nbsp;|&nbsp; --}}
                                            <a href="{{ route('shop', ['sub_category_id' => $product->subCategory->id ?? 0]) }}"
                                                title="Browse more {{ $product->subCategory->name ?? 'Subcategory' }}">
                                                {{ $product->subCategory->name ?? 'Subcategory' }}
                                            </a>
                                        </span>
                                    </h3>

                                    <!-- Prices -->
                                    <div class="eg-product__pricing" itemprop="offers" itemscope
                                        itemtype="https://schema.org/Offer">
                                        <link itemprop="url"
                                            href="{{ route('product', ['id' => $product->id, 'name' => Illuminate\Support\Str::slug($product->name)]) }}">
                                        <meta itemprop="priceCurrency" content="PKR">

                                        @if ($product->original_price > $product->discounted_price)
                                            <del class="eg-product_card_price-old" aria-label="Original Price">
                                                PKR <span
                                                    itemprop="highPrice">{{ number_format($product->original_price, 0) }}</span>
                                            </del>
                                        @endif

                                        <div class="pb-4">
                                            <span class="eg-product__price-new" itemprop="price">
                                                PKR {{ number_format($product->discounted_price, 0) }}
                                            </span>
                                            <span class="eg-product__badge">
                                                {{ round((($product->original_price - $product->discounted_price) / $product->original_price) * 100) }}% Off
                                            </span>
                                            <meta itemprop="availability" content="http://schema.org/InStock">
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="eg-product__btn d-flex align-items-center justify-content-center">
                                        <a wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled"
                                            class="eg-product__cart mr-15" style="cursor: pointer;"
                                            title="Add {{ $product->name }} to Cart">
                                            <span><img src="{{ asset('assets/img/icon/cart.svg') }}"
                                                    alt="Cart icon"></span>
                                        </a>
                                        <a class="eg-btn" wire:click="addToCartAndRedirect({{ $product->id }})"
                                            title="Buy {{ $product->name }} Now">
                                            Buy Now
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->

</main>
