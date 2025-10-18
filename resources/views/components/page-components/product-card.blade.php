<!-- Product Card -->
<div class="col-6 col-sm-6 col-md-4 col-lg-6 col-xl-4" style="margin-block: 8px;" wire:key="product-{{ $product->id }}">
    <article class="eg-product__item text-center p-3" itemscope itemtype="https://schema.org/Product">

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
        </div>
    </article>
</div>
<!-- End Product Card -->
