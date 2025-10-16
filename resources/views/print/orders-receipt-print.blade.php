<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt # MS-{{ $order->id }}</title>
    <style>
        @page {
            margin: 15mm 15mm;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #222;
            line-height: 1.5;
            margin: 0;
        }

        .receipt {
            max-width: 750px;
            margin: 0 auto;
        }

        .brand {
            text-align: center;
            margin-bottom: 15px;
        }

        .brand h1 {
            font-size: 26px;
            letter-spacing: 1px;
            margin: 0;
            color: #111;
        }

        .brand p {
            margin: 3px 0 0;
            color: #666;
            font-size: 13px;
        }

        hr {
            border: 0;
            border-top: 2px solid #000;
            margin: 10px 0 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .header p {
            margin: 5px 0;
            font-size: 13px;
            color: #555;
        }

        .info-grid {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 15px;
        }

        .info-grid > div {
            flex: 1;
        }

        h3 {
            margin: 0 0 5px;
            font-size: 13px;
            text-transform: uppercase;
            border-bottom: 1px solid #000;
            padding-bottom: 3px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul li {
            margin-bottom: 4px;
        }

        address {
            font-style: normal;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background: #f7f7f7;
        }

        tfoot th {
            border-top: 2px solid #000;
            text-align: right;
        }

        .total {
            font-size: 13px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 11px;
            color: #777;
        }

        /* prevent page breaks */
        table, tr, td, th, div, p {
            page-break-inside: avoid;
        }

    </style>
</head>
<body>
    <div class="receipt">

        <div class="brand">
            <h1>Munna Supplements</h1>
            <p>Premium Health & Nutrition Store</p>
        </div>

        <hr>

        <div class="header">
            <h2>Order Receipt</h2>
            <p>Order # MS-{{ $order->id }} | {{ $order->created_at->format('Y-m-d') }}</p>
        </div>

        <div class="info-grid">
            <div>
                <h3>Order Information</h3>
                <ul>
                    <li><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</li>
                    <li><strong>Total:</strong> PKR {{ number_format($order->total_amount, 2) }}</li>
                </ul>
            </div>
            <div>
                <h3>Billing Address</h3>
                <address>
                    {{ $order->orderDetail->name }}<br>
                    {{ $order->orderDetail->address }}<br>
                    {{ $order->orderDetail->city }}<br>
                    Phone: {{ $order->orderDetail->phone_number }}<br>
                    Email: {{ $order->user->email }}
                </address>
            </div>
            <div>
                <h3>Shipping Address</h3>
                <address>
                    {{ $order->orderDetail->name }}<br>
                    {{ $order->orderDetail->address }}<br>
                    {{ $order->orderDetail->city }}<br>
                    Phone: {{ $order->orderDetail->phone_number }}
                </address>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th width="10%">Qty</th>
                    <th width="20%">Price</th>
                    <th width="20%">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>PKR {{ number_format($item->price, 2) }}</td>
                        <td>PKR {{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="total">Total</th>
                    <th class="total">PKR {{ number_format($order->total_amount, 2) }}</th>
                </tr>
            </tfoot>
        </table>

        <div class="footer">
            <p>Thank you for shopping at <strong>Munna Supplements</strong>!</p>
            <p>This is a computer-generated receipt. No signature required.</p>
        </div>

    </div>
</body>
</html>
