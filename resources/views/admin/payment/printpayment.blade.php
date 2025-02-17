<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3P.Shop - Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .invoice-box { width: 100%; max-width: 800px; margin: auto; border: 1px solid #ddd; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 10px; text-align: left; }
        .btn { padding: 8px 15px; color: white; text-decoration: none; border-radius: 5px; }
        .btn-primary { background-color: #007bff; }
        .btn-success { background-color: #28a745; }
    </style>
</head>
<body>

    <div class="invoice-box">
        <h2 style="text-align: center;">3P.Shop - Invoice</h2>
        
        <p><strong>Name:</strong> {{ $printpayment_first->user->name }}</p>
        <p><strong>Phone:</strong> {{ $printpayment_first->user->phone }}</p>
        <p><strong>Voucher No:</strong> {{ $printpayment_first->voucher_no }}</p>

        <table>
            <tr>
                <th>No.</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Qty</th>
                <th>Amount</th>
            </tr>
            @foreach($payments as $key => $payment)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $payment->product_name }}</td>
                <td>{{ number_format($payment->price) }}</td>
                <td>{{ $payment->discount }}%</td>
                <td>{{ $payment->quantity }}</td>
                <td>{{ number_format(($payment->price * $payment->quantity) - ($payment->price * $payment->quantity * $payment->discount / 100)) }}</td>
            </tr>
            @endforeach
        </table>

        <p><strong>Total:</strong> {{ number_format($payments->sum('total_amount')) }}</p>

        <!-- Print Dialog & PDF Export Button -->
        <a href="{{ route('export-pdf', $printpayment_first->voucher_no) }}" class="btn btn-success">Export PDF</a>
        <a href="#" onclick="printInvoice()" class="btn btn-primary">Print</a>
    </div>

    <script>
        function printInvoice() {
            window.print(); // Print Dialog ကို ပြမယ်
        }
    </script>

</body>
</html>
