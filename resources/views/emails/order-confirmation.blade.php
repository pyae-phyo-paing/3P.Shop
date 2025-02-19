<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3P.Shop-Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .content {
            padding: 20px;
        }
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .order-table th, .order-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .order-table th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header"><span>3P.Shop</span>-Order Confirmation</div>
        <div class="content">
            <p>Dear {{ Auth::user()->name }},</p>
            <p>Thank you for your purchase!</p>
            <p>Your payment is being checked by the 3P.Shop Team. Your payment voucher will be sent via email shortly.</p>
            <p>Your orders may take up to a week for it to arrive.</p>
            <p>Your order has been received. Here are your order details:</p>

            <table class="order-table">
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                @foreach ($orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->price }} </td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
                @endforeach

            </table>

            <p><strong>Total Amount: {{ number_format(collect($orderItems)->sum('total')) }} MMK</strong></p>
            <p>We will process your order soon. Thank you for shopping with us!</p>
        </div>
        <div class="footer">© {{ date('Y') }} <span class="text-success">3P.Shop</span></div>
    </div>
</body>
</html>
