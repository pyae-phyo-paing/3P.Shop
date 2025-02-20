<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3P.Shop-Payment Voucher</title>
    <style>
        body { font-family: 'Arial', sans-serif; background: #f9f9f9; margin: 0; padding: 20px; }
        .invoice-container { max-width: 800px; background: #fff; padding: 20px; margin: auto; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); position: relative; }
        .header { display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; border-bottom: 2px solid #ddd; }
        .header img { width: 120px; }
        .header h2 { color: #333; margin: 0; font-size: 22px; }
        .details { margin-top: 20px; font-size: 14px; color: #555; }
        .details p { margin: 5px 0; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { padding: 12px; border: 1px solid #ddd; text-align: left; font-size: 14px; }
        .table th { background: #f0f0f0; color: #333; }
        .table tbody tr:nth-child(even) { background: #f9f9f9; }
        .summary { text-align: right; margin-top: 20px; font-size: 16px; font-weight: bold; color: #333; }
        .footer { margin-top: 30px; text-align: center; font-size: 12px; color: #777; }
        .paid-watermark {
            position: absolute; top: 35%; left: 10%;
            font-size: 120px; color: rgba(255, 0, 0, 0.2);
            transform: rotate(-25deg);
            font-weight: bold;
            text-transform: uppercase;
        }
        .signature-section { display: flex; justify-content: space-between; margin-top: 40px; }
        .signature-box { text-align: center; font-size: 14px; color: #555; }
        .signature-box div { width: 200px; border-top: 2px solid #333; margin-top: 10px; padding-top: 5px; }
        .qr-code { text-align: right; margin-top: 20px; }
        .qr-code img { width: 100px; }
    </style>
</head>
<body>

<div class="invoice-container">
    <div class="header">
        <h2><span class="text-success">3P.Shop</span>-Payment Voucher</h2>
    </div>

    <div class="details">
        <p><strong>Customer Name:</strong> {{ $payments->first()->user->name }}</p>
        <p><strong>Email:</strong> {{ $payments->first()->user->email }}</p>
        <p><strong>Voucher No:</strong> {{ $payments->first()->voucher_no }}</p>
        <p><strong>Date:</strong> {{ $payments->first()->transation_date }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Size</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->product->name }}</td>
                <td>{{ $payment->product_size }}</td>
                <td>{{ $payment->category }}</td>
                <td>{{ $payment->brand }}</td>
                <td>{{ $payment->qty }}</td>
                <td>{{ $payment->price }}</td>
                <td>{{ $payment->discount }}%</td>
                <td>{{$payment->total  }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        Total Amount: {{ number_format($payments->sum('total')) }} MMK
    </div>

    <div class="paid-watermark">PAID</div>
    
    <div class="footer">
        <p>Thank you for shopping with us!</p>
        <p>&copy; {{ date('Y') }} 3P.Shop . All rights reserved.</p>
    </div>

    
</div>

</body>
</html>
