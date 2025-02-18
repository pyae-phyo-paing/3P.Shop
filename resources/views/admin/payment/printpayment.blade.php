@extends('layouts.admin')
@section('content')
<style>
    /* Web View Styling */
    #invoice-print-area {
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        margin: 20px auto;
        max-width: 800px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    h2 {
        text-align: center;
        color: #3c3c3c;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .invoice-info p {
        margin: 5px 0;
        color: #555;
    }

    .invoice-info strong {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
        text-align: center;
    }

    th, td {
        padding: 12px;
        font-size: 14px;
        color: #333;
    }

    th {
        background-color: #f2f2f2;
        color: #000;
        font-weight: 700;
    }

    .total {
        font-size: 18px;
        font-weight: 700;
        text-align: right;
        margin-top: 20px;
    }

    .no-print {
        text-align: center;
        margin-top: 20px;
    }

    /* Watermark Styling */
    .watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-45deg);
        font-size: 180px;
        color: rgba(0, 0, 0, 0.05);
        z-index: -1;
        white-space: nowrap;
        pointer-events: none; /* Prevents watermark from blocking clicks */
    }

    /* PAID Watermark (Bottom) */
    .paid-watermark {
        position: absolute;
        bottom: 10%;
        left: 50%;
        transform: translate(-50%, 0);
        font-size: 100px;
        font-weight: bold;
        color: rgba(255, 0, 0, 0.2);
        z-index: 0;
        white-space: nowrap;
        text-transform: uppercase;
        pointer-events: none;
    }

    /* Print Styling */
    @media print {
        @page {
            margin: 0;
            size: auto;
        }

        body * {
            visibility: hidden;
        }

        #invoice-print-area, #invoice-print-area * {
            visibility: visible;
        }

        #invoice-print-area {
            width: 100%;
            height: 100%;
            padding: 30px;
            box-sizing: border-box;
            margin: 0;
            position: relative;
        }

        .watermark {
            font-size: 180px;
        }

        h2 {
            font-size: 32px;
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .invoice-info div {
            width: 48%;
        }

        table {
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            font-size: 14px;
        }

        .total {
            font-size: 18px;
            margin-top: 20px;
        }

        .no-print {
            display: none;
        }
    }

    /* Landscape Mode */
    @media print and (orientation: landscape) {
        .watermark {
            font-size: 250px;
        }

        h2 {
            font-size: 36px;
        }
    }
</style>

<div>
    <div id="invoice-print-area">
        <!-- Watermark -->
        <div class="watermark">3P.Shop</div>
        <div class="paid-watermark">PAID</div>

        <h2> <span class="text-success">3P.Shop</span> - Invoice</h2>

        <!-- User & Payment Info -->
        <div class="invoice-info">
            <div>
                <p><strong>Customer Name:</strong> {{ $printpayment_first->user->name ?? 'N/A' }}</p>
                <p><strong>Payment Method:</strong> {{ $printpayment_first->payment_method ?? 'N/A' }}</p>
            </div>
            <div>
                <p><strong>Voucher No:</strong> {{ $printpayment_first->voucher_no }}</p>
                <p><strong>Date:</strong> {{ $printpayment_first->transation_date }}</p>
            </div>
        </div>

        <!-- Invoice Table -->
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Qty</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $key => $payment)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $payment->product->name }}</td>
                    <td>{{ $payment->price ?? $payment->product->price }}</td>
                    <td>{{ $payment->discount ?? $payment->product->price }}%</td>
                    <td>{{ $payment->qty }}</td>
                    <td>{{ $payment->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="total"><strong>Total:</strong> {{ number_format($payments->sum('total')) }}</p>
    </div>

    <!-- Print & PDF Buttons -->
    <div class="no-print">
        <a onclick="window.history.back();" class="btn btn-danger">Cancel</a>
        <a href="#" onclick="printInvoice()" class="btn btn-primary">Print</a>
    </div>
</div>

<script>
    function printInvoice() {
        window.print();
    }

</script>
@endsection