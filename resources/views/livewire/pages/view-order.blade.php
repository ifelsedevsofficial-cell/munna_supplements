<main class="fix">

    <!-- breadcrumb-area-start -->
    <section class="eg-breadcrumb__area theme-bg mb-130 p-relative z-index-1 scene">
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
                                    <li class="eg-breadcrumb__item"><a href="{{ asset('order.show') }}">Orders</a></li>
                                    <li class="eg-breadcrumb__item active" aria-current="page">{{ $order->id }}</li>
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

    <!-- order details -->
    <section class="eg-order-details__area mb-120">
        <div class="container">

            <!-- order info -->
            <div class="mb-4">
                <h3 class="eg-checkout__title mb-20">Order Information</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Order Number:</strong> #{{ $order->id }}
                    </li>
                    <li class="list-group-item">
                        <strong>Date:</strong> {{ $order->created_at->format('Y-m-d') }}
                    </li>
                    <li class="list-group-item">
                        <strong>Status:</strong>
                        <span class="badge {{ $order->status_badge_class }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </li>
                    <li class="list-group-item">
                        <strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}
                    </li>
                    <li class="list-group-item">
                        <strong>Total:</strong> PKR {{ number_format($order->total_amount, 2) }}
                    </li>
                </ul>
            </div>


            <div class="row">
                <!-- billing address -->
                <div class="col-md-6 mb-4">
                    <h4>Billing Address</h4>
                    <address>
                        {{ $order->orderDetail->name }} <br>
                        {{ $order->orderDetail->address }} <br>
                        {{ $order->orderDetail->city }} <br>
                        Phone: {{ $order->orderDetail->phone_number }} <br>
                        Email: {{ $order->user->email }}
                    </address>
                </div>

                @if ($order->payment_method === 'online')
                    <div class="col-md-6 mb-4">
                        <h4>Transaction Image</h4>
                        <img style="max-height: 600px" src="{{ asset('storage/' . $order->transaction_image) }}" />
                    </div>
                @endif

                {{--
                <!-- shipping address -->
                <div class="col-md-6 mb-4">
                    <h4>Shipping Address</h4>
                    <address>
                        {{ $order->orderDetail->name }} <br>
                        {{ $order->orderDetail->address }} <br>
                        {{ $order->orderDetail->city }} <br>
                        Phone: {{ $order->orderDetail->phone_number }}
                    </address>
                </div> --}}
            </div>


            <!-- order items -->
            <div class="table-responsive">
                <h4 class="mb-3">Products</h4>
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                        alt="{{ $item->product->name }}" width="60">
                                </td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>PKR {{ number_format($item->price, 2) }}</td>
                                <td>PKR {{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end">Total</th>
                            <th>PKR {{ number_format($order->total_amount, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </section>

</main>
