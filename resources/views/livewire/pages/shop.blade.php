<div wire:ignore>
    <!-- breadcrumb-area-start -->
    <section class="eg-breadcrumb__area theme-bg mb-120 p-relative z-index-1 scene d-none d-md-block">
        <div class="eg-breadcrumb">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="eg-breadcrumb__title-opacity d-flex justify-content-center">
                                <h2 class="title">Products</h2>
                            </div>
                        </div>
                        <div class="eg-breadcrumb__content">
                            <h2 class="title">Products</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="eg-breadcrumb__list">
                                    <li class="eg-breadcrumb__item"><a href="{{ asset('home') }}">Home</a></li>
                                    <li class="eg-breadcrumb__item active" aria-current="page">Products</li>
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

    <!-- product-area-start -->
    <section class="product-area pb-120">
        <x-partials.box />
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="eg-product__sidebar p-relative">
                        <div class="eg-product__search d-block p-relative mb-30">
                            <form action="">
                                <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                                <input type="text" name="query" placeholder="Keyword...">
                            </form>
                        </div>
                        {{-- <div class="eg-product__price-range">
                            <h3 class="eg-product__sidebar-title">Price</h3>
                            <div class="eg-product__range-head">
                                <div id="eg-slider__range"></div>
                                <div class="eg-product__price-range-min-max">
                                    <input type="text" id="amount">
                                    <input type="submit" value="Filter" id="filter">
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="eg-product__categories">
                            <h3 class="eg-product__sidebar-title">Categories</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('shop', ['category_id' => $category->id]) }}"
                                            title="Browse products in {{ $category->name }}">
                                            <span class="fa fa-arrow-right" aria-hidden="true"></span>
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach

                                <!-- Reset filters -->
                                <li>
                                    <a href="{{ route('shop') }}" title="Reset category filters">
                                        <span class="fa fa-arrow-right" aria-hidden="true"></span>
                                        Reset Filters
                                    </a>
                                </li>
                            </ul>
                        </div> --}}

                        <div class="eg-product__categories">
                            <div class="col-xl-3 col-lg-4 d-none d-md-block">
                                <h3 class="eg-product__sidebar-title">Categories</h3>
                                <ul>
                                    @foreach ($subCategories as $subCategory)
                                        <li
                                            class="{{ request('sub_category_id') == $subCategory->id ? 'active' : '' }}">
                                            <a class="w-full"
                                                href="{{ route('shop', ['sub_category_id' => $subCategory->id]) }}"
                                                title="Browse products in {{ $subCategory->name }}">
                                                <span class="fa fa-arrow-right" aria-hidden="true"></span>
                                                {{ $subCategory->name }}
                                                {{-- - ({{ $subCategory->category->name }}) --}}
                                            </a>
                                        </li>
                                    @endforeach

                                    <!-- Reset filters -->
                                    <li>
                                        <a href="{{ route('shop') }}" title="Reset filters">
                                            <span class="fa fa-arrow-right" aria-hidden="true"></span>
                                            Reset Filters
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Mobile Category Dropdown -->
                            <div class="d-md-none mb-4">
                                <div class="mobile-category-dropdown">
                                    <select class="form-select form-select-lg category-select"
                                        onchange="if (this.value) window.location.href=this.value">
                                        <option value="">Browse Categories</option>
                                        @foreach ($subCategories as $subCategory)
                                            <option
                                                value="{{ route('shop', ['sub_category_id' => $subCategory->id]) }}"
                                                {{ request('sub_category_id') == $subCategory->id ? 'selected' : '' }}>
                                                {{ $subCategory->name }}
                                            </option>
                                        @endforeach
                                        <option value="{{ route('shop') }}">Reset Filters</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="eg-sidebar__widget mt-30 mb-30">
                            <div class="eg-sidebar__widget-title">
                                <h4 class="title">Popular Tags</h4>
                            </div>
                            <div class="eg-sidebar__widget-content">
                                <div class="eg-sidebar__widget-tagcloud">
                                    <a href="shop.html#">Energy</a>
                                    <a href="shop.html#">Fitness</a>
                                    <a href="shop.html#">Healthy</a>
                                    <a href="shop.html#">Powders </a>
                                    <a href="shop.html#">Nutrition</a>
                                    <a href="shop.html#">Protein</a>
                                    <a href="shop.html#">Snacks</a>
                                    <a href="shop.html#">Wellness</a>
                                    <a href="shop.html#">Food</a>
                                    <a href="shop.html#">Diet</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="eg-product__info-top">
                        <div class="eg-product__showing-top pt-4 pt-lg-0">
                            <p class="eg-product__showing-text">Showing
                                {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }}
                                Results
                            </p>
                        </div>
                        {{-- <div class="eg-product__showing-sort">
                            <select class="eg-product__filter shop-filter">
                                <option selected="">Sort by popular</option>
                                <option value="1">Sort by view</option>
                                <option value="2">Sort by price</option>
                                <option value="3">Sort by ratings</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="row g-2">
                        @forelse ($products as $product)
                            <x-page-components.product-card :product="$product" />
                        @empty
                            <span class="p-4">
                                No Products found
                            </span>
                        @endforelse
                    </div>
                    <div class="eg-postbox__pagination text-center">
                        {{ $products->links('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-area-start -->
</div>
