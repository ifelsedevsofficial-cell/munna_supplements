<a href="https://wa.me/message/XLJC2AHNPV23E1" class="floating-whatsapp" target="_blank" aria-label="Chat on WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 448 512" fill="#fff">
        <path
            d="M380.9 97.1C339 55.2 283.2 32 224.4 32 110.7 32 17.6 125.1 17.6 238.8c0 41.3 11 81.5 31.8 116.8L3.4 480l129.2-45.3c33.3 18.3 70.7 27.9 109.1 27.9h.1c113.7 0 206.8-93.1 206.8-206.8 0-58.8-23.2-114.6-65.1-156.5zM224.4 426c-33.7 0-66.8-9.1-95.5-26.4l-6.8-4.1-76.7 26.9 26.1-74-4.4-7C49 308.2 40 274.1 40 238.8 40 140.6 126.2 54.4 224.4 54.4c52.6 0 101.9 20.5 139 57.7s57.7 86.4 57.7 139c0 98.2-86.2 184.4-184.4 184.4zm101.7-138.6c-5.5-2.8-32.5-16-37.6-17.8-5.1-1.9-8.9-2.8-12.7 2.8s-14.6 17.8-17.9 21.5c-3.2 3.7-6.5 4.2-12 1.4s-23.4-8.6-44.6-27.5c-16.5-14.7-27.7-32.8-30.9-38.3s-.3-8.5 2.4-11.3c2.5-2.6 5.7-6.8 8.5-10.2 2.8-3.4 3.7-5.7 5.6-9.5s.9-7.1-.5-10-12.7-30.7-17.5-42c-4.6-11-9.3-9.5-12.7-9.7-3.3-.2-7.1-.2-10.8-.2s-10 1.4-15.2 7.1c-5.2 5.7-20 19.5-20 47.6s20.5 55.2 23.4 59c2.8 3.8 40.4 61.6 97.9 86.3 13.7 5.9 24.4 9.4 32.7 12 13.7 4.3 26.2 3.7 36.1 2.3 11-1.6 32.5-13.3 37.1-26.2s4.6-23.9 3.2-26.2c-1.3-2.3-5-3.7-10.5-6.5z" />
    </svg>
</a>

<!-- Mobile Bottom Navigation Bar (Creative Icons + Labels) -->
<div class="mobile-bottom-nav d-flex justify-content-around align-items-center theme-bg d-md-none absolute bottom-0"
    style="position: sticky;
    z-index: 999;
    padding-block: 10px;
    color: white;">
    <a href="{{ route('shop.home') }}" class="mobile-nav-item" aria-label="Home">
        <!-- Creative Home Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffffff" viewBox="0 0 24 24">
            <path d="M3 9.75L12 3l9 6.75V21a1.25 1.25 0 0 1-1.25 1.25H4.25A1.25 1.25 0 0 1 3 21V9.75z" />
        </svg>
        <span>Home</span>
    </a>
    <a href="{{ route('shop') }}" class="mobile-nav-item" aria-label="Categories">
        <!-- Creative Categories Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffffff" viewBox="0 0 24 24">
            <path d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z" />
        </svg>
        <span>Products</span>
    </a>
    <a href="{{ route('cart') }}" class="mobile-nav-item" aria-label="Cart">
        <!-- Creative Cart Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffffff" viewBox="0 0 24 24">
            <path
                d="M7 4h-2l-1 2H2v2h2l3.6 7.59-1.35 2.44A1 1 0 0 0 7 20h12v-2H7.42c.06-.13.13-.26.21-.38L9.1 16h7.45a1 1 0 0 0 .92-.61l3.24-7.26A.998.998 0 0 0 19.9 6H7.21L7 4z" />
        </svg>
        <span>Cart</span>
    </a>
    @auth
        <a href="{{ route('orders') }}" class="mobile-nav-item" aria-label="Account">
            <!-- Creative User Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffffff" viewBox="0 0 24 24">
                <path d="M12 12c2.67 0 8 1.34 8 4v4H4v-4c0-2.66 5.33-4 8-4zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
            </svg>
            <span>Orders</span>
        </a>
    @else
        <a href="{{ route('shop.register') }}" class="mobile-nav-item" aria-label="Account">
            <!-- Creative User Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffffff" viewBox="0 0 24 24">
                <path d="M12 12c2.67 0 8 1.34 8 4v4H4v-4c0-2.66 5.33-4 8-4zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
            </svg>
            <span>Signup</span>
        </a>
    @endauth
</div>
