       <div class="swiper-slide text-center mb-50 mt-50" wire:key="product-{{ $product->id }}">
           <article class="eg-product__item text-center" style="position: relative;" itemscope
               itemtype="https://schema.org/Product">
               <div class="eg-product__thumb">
                   <a href="{{ route('product', ['id' => $product->id, 'name' => Illuminate\Support\Str::slug($product->name)]) }}"
                       title="View details of {{ $product->name }}">
                       <img src="{{ asset("storage/$product->image") }}"
                           alt="{{ $product->name }} - Buy Online at Best Price in Pakistan"
                           class="img-fluid product-img" loading="lazy" itemprop="image"
                           style="width: 100%;
    height: auto;
    max-height: 180px;
    object-fit: contain;
    border-radius: 12px;
    padding-inline: 8px;">
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
                   <div class="eg-product__pricing" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                       <link itemprop="url"
                           href="{{ route('product', ['id' => $product->id, 'name' => Illuminate\Support\Str::slug($product->name)]) }}">
                       <meta itemprop="priceCurrency" content="PKR">

                       @if ($product->original_price > $product->discounted_price)
                           <del class="eg-product_card_price-old" aria-label="Original Price">
                               PKR <span itemprop="highPrice">{{ number_format($product->original_price, 0) }}</span>
                           </del>
                       @endif

                       <div class="pb-4">
                           <span class="eg-product__price-new" itemprop="price">
                               PKR {{ number_format($product->discounted_price, 0) }}
                           </span>
                           <span class="eg-product__badge">
                               {{ round((($product->original_price - $product->discounted_price) / $product->original_price) * 100) }}%
                               Off
                           </span>
                           <meta itemprop="availability" content="http://schema.org/InStock">
                       </div>
                   </div>

                   <!-- Buttons -->
                   <div class="d-none eg-product__btn d-md-flex align-items-center justify-content-center">
                       <a wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled"
                           class="eg-product__cart mr-15" style="cursor: pointer;"
                           title="Add {{ $product->name }} to Cart">
                           <span><img src="{{ asset('assets/img/icon/cart.svg') }}" alt="Cart icon"></span>
                       </a>
                       <a class="eg-btn" wire:click="addToCartAndRedirect({{ $product->id }})"
                           title="Buy {{ $product->name }} Now">
                           Buy Now
                       </a>
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
                               {{-- Buy --}}
                               <svg style="color:
                               white;"
                                   xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                   fill="none" stroke-width="2" stroke="currentColor" stroke-linecap="round"
                                   stroke-linejoin="round">
                                   <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                               </svg>
                           </span>
                       </a>
                   </div>

               </div>
           </article>
       </div>
