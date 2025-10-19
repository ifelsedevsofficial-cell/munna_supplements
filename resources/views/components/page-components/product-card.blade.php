<!-- Product Card -->
<div class="col-6 col-sm-6 col-md-4 col-lg-6 col-xl-4" style="margin-block: 8px;" wire:key="product-{{ $product->id }}">
    <article class="eg-product__item text-center p-3" style="position: relative;" itemscope
        itemtype="https://schema.org/Product">

        <!-- Product Image -->
        <div class="eg-product__thumb position-relative">
            <a href="{{ route('product', ['id' => $product->id, 'name' => Illuminate\Support\Str::slug($product->name)]) }}"
                title="View details of {{ $product->name }}">
                <img src="{{ asset("storage/$product->image") }}"
                    alt="{{ $product->name }} - Buy Online at Best Price in Pakistan" class="img-fluid product-img"
                    loading="lazy" itemprop="image"
                    style="width: 100%; height: auto; max-height: 180px; object-fit: contain; border-radius: 12px; padding-inline: 8px;">
            </a>

            <!-- Discount Badge -->
            @if ($product->original_price > $product->discounted_price)
                <span class="eg-product__badge">
                    {{ round((($product->original_price - $product->discounted_price) / $product->original_price) * 100) }}%
                    Off
                </span>
            @endif
        </div>

        <!-- Product Info -->
        <div class="eg-product__content">
            <!-- Product Name -->
            <h2 class="eg-product__title" itemprop="name">
                <a href="{{ route('product', ['id' => $product->id, 'name' => Illuminate\Support\Str::slug($product->name)]) }}"
                    title="Buy {{ $product->name }} Online in Pakistan">
                    {{ $product->name }}
                </a>
            </h2>

            <!-- Subcategory -->
            <h3 class="eg-product__category" style="font-size: small;">
                <a href="{{ route('shop', ['sub_category_id' => $product->subCategory->id ?? 0]) }}"
                    title="Browse more {{ $product->subCategory->name ?? 'Subcategory' }}">
                    {{ $product->subCategory->name ?? 'Subcategory' }}
                </a>
            </h3>

            <!-- Pricing -->
            <div class="eg-product__pricing" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                @if ($product->original_price > $product->discounted_price)
                    <del class="eg-product_card_price-old">PKR {{ number_format($product->original_price, 0) }}</del>
                @endif
                <div class="pb-2">
                    <span class="eg-product__price-new" itemprop="price">PKR
                        {{ number_format($product->discounted_price, 0) }}</span>
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-none eg-product__btns mt-3 d-md-flex align-items-center justify-content-center gap-2">
                <button wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled" class="btn-cart"
                    title="Add {{ $product->name }} to Cart">
                    <img src="{{ asset('assets/img/icon/cart.svg') }}" alt="Cart icon" class="btn-cart-icon">
                </button>
                <button class="btn-buy" wire:click="addToCartAndRedirect({{ $product->id }})"
                    title="Buy {{ $product->name }} Now">
                    Buy Now
                </button>
            </div>

            <div class="eg-product__btn d-flex d-md-none align-items-center justify-content-center"
                style="/* transform: translateY(-210px); */position: absolute;top: 172px;right: 0;">
                <a wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled"
                    class="eg-product__cart mr-6" style="cursor: pointer; margin-right: 2px;"
                    title="Add {{ $product->name }} to Cart">
                    <span><img src="{{ asset('assets/img/icon/cart.svg') }}" alt="Cart icon"></span>
                </a>
                <a class="eg-product__cart mr-15" wire:click="addToCartAndRedirect({{ $product->id }})"
                    title="Buy {{ $product->name }} Now">
                    <span style="background-color: #d32a36 !important;">
                        {{-- <img src="{{ asset('assets/img/icon/cart.svg') }}" alt="Cart icon"> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" style="color: white;" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        {{-- Buy --}}
                    </span>
                </a>
            </div>

        </div>
    </article>
</div>
<!-- End Product Card -->
