<main class="fix">

    <!-- breadcrumb-area-start -->
    <section class="eg-breadcrumb__area theme-bg mb-130 p-relative z-index-1 scen d-none d-md-block">
        <div class="eg-breadcrumb">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="eg-breadcrumb__title-opacity d-flex justify-content-center">
                                <h2 class="title">Orders</h2>
                            </div>
                        </div>
                        <div class="eg-breadcrumb__content">
                            <h2 class="title">Orders</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="eg-breadcrumb__list">
                                    <li class="eg-breadcrumb__item"><a href="{{ asset('home') }}">Home</a></li>
                                    <li class="eg-breadcrumb__item active" aria-current="page">Orders</li>
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

    <div class="eg-order__wrapper">
        <div style="height:100px;" class="d-md-none"></div>
        <h3 class="eg-checkout__title mb-30">Your Orders</h3>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Payment Method</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>
                                <span class="badge {{ $order->status_badge_class }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>{{ strtoupper($order->payment_method) }}</td>
                            <td>PKR {{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                <a href="
                                        {{ route('order.show', ['id' => $order->id]) }}
                                         "
                                    class="btn btn-sm btn-primary">
                                    View
                                </a>
                                @if (in_array($order->status, ['pending', 'processing']))
                                    <a href="{{ route('order.cancel', ['id' => $order->id]) }}"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to cancel this order?');">
                                        Cancel
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No orders found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </section>


</main>
