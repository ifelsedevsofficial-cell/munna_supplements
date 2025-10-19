<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    const texts = [
        document.getElementById('text1'),
        document.getElementById('text2'),
        document.getElementById('text3'),
        document.getElementById('text4')
    ];
    let index = 0;

    function showNext() {
        // hide all first
        texts.forEach(t => t.classList.remove('active', 'hide'));

        // show current
        const current = texts[index];
        current.classList.add('active');

        // hide after 3 seconds
        setTimeout(() => current.classList.add('hide'), 28000);

        // move to next
        index = (index + 1) % texts.length;
    }

    // start animation
    showNext();
    setInterval(showNext, 2500); // total cycle = 2.5s per slide
</script>


<script>
    let heroSlides = document.querySelectorAll('.hero-slide');
    let current = 0;

    function nextSlide() {
        heroSlides[current].classList.remove('active');
        current = (current + 1) % heroSlides.length;
        heroSlides[current].classList.add('active');
    }

    setInterval(nextSlide, 4000); // change every 4s
</script>
<script>
    window.addEventListener('cart-updated', e => {
        console.log('Cart updated event:', e.detail); // DEBUG

        cartCount = e.detail[0].count;
    });
    // document.addEventListener("livewire:init", () => {
    //     Livewire.hook("commit.prepare", () => window.NProgress.start());
    //     Livewire.hook("commit", ({
    //             succeed
    //         }) =>
    //         succeed(() => queueMicrotask(() => window.NProgress.done()))
    //     );
    // });
</script>

@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Toastify({
                text: "{{ session('success') }}",
                duration: 4000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            }).showToast();
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Toastify({
                text: "{{ session('error') }}",
                duration: 4000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #e53935, #e35d5b)",
            }).showToast();
        });
    </script>
@endif

<script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
<script src="{{ asset('assets/js/vendor/waypoints.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/nice-select.js') }}"></script>
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
<script src="{{ asset('assets/js/jquery.odometer.min.js') }}"></script>
<script src="{{ asset('assets/js/range-slider.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/parallax.js') }}"></script>
<script src="{{ asset('assets/js/ajax-form.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
