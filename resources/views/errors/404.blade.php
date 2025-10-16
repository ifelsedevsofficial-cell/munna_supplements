{{-- @extends('errors::minimal') --}}

<x-layouts.app>


    <main class="fix">

        <!-- error-area-start -->
        <section class="eg-error__area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-9 col-md-10">
                        <div class="eg-error__content text-center">
                            <h2 class="eg-error__title">404</h2>
                            <p>{{ __('Sorry, the page you are looking for could not be found') }}</p>
                            <a class="eg-btn" href="{{ route('shop.home') }}">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- error-area-start -->

    </main>
    {{-- @php
        $error = empty($exception->getMessage()) ? 'Not Found' : $exception->getMessage();
    @endphp

    @section('title', __('Not Found'))
    @section('code', '404')
    @section('message', __($error)) --}}

</x-layouts.app>
