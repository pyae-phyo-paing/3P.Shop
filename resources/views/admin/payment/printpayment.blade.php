@extends('layouts.admin')
@section('content')
<style>
    @media print {
        /* Default Page Settings for Portrait and Landscape */
        @page {
            margin: 0;
            size: auto;
        }

        /* UI တွေမပေါ်စေဖို့ */
        body * {
            visibility: hidden;
        }

        #invoice-print-area, #invoice-print-area * {
            visibility: visible;
        }

        /* Portrait Mode */
        @media print and (orientation: portrait) {
            #invoice-print-area {
                width: 100%;
                height: 100%;
                padding: 30px;
                box-sizing: border-box;
                margin: 0;
                transform: scale(0.9); /* Scale to fit the portrait page */
                transform-origin: top center;
                position: relative;
            }

            /* Background watermark for Portrait */
            #invoice-print-area::before {
                content: "3P.Shop";
                font-size: 180px;
                color: rgba(0, 0, 0, 0.05);
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) rotate(-45deg);
                z-index: -1;
                white-space: nowrap;
            }

            /* Title Styling */
            h2 {
                text-align: center;
                color: #3c3c3c;
                font-size: 32px;
                font-weight: 700;
                margin-bottom: 20px;
            }

            /* Invoice Info Styling */
            .invoice-info {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
                font-size: 16px;
            }

            .invoice-info div {
                width: 48%;
            }

            .invoice-info p {
                margin: 5px 0;
                color: #555;
            }

            .invoice-info strong {
                color: #333;
            }

            /* Invoice Table Styling */
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

            /* Total Calculation */
            .total {
                font-size: 18px;
                font-weight: 700;
                text-align: right;
                margin-top: 20px;
            }
        }

        /* Landscape Mode */
        @media print and (orientation: landscape) {
            #invoice-print-area {
                width: 100%;
                height: 100%;
                padding: 10px;
                box-sizing: border-box;
                margin: 0;
                transform: none;
                position: relative;
            }

            /* Background watermark for Landscape */
            #invoice-print-area::before {
                content: "3P.Shop";
                font-size: 250px;
                color: rgba(0, 0, 0, 0.05);
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) rotate(-45deg);
                z-index: -1;
                white-space: nowrap;
            }

            /* Title Styling for Landscape */
            h2 {
                text-align: center;
                color: #3c3c3c;
                font-size: 36px;
                font-weight: 700;
                margin-bottom: 20px;
            }

            /* Invoice Info Styling */
            .invoice-info {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
                font-size: 16px;
            }

            .invoice-info div {
                width: 48%;
            }

            .invoice-info p {
                margin: 5px 0;
                color: #555;
            }

            .invoice-info strong {
                color: #333;
            }

            /* Invoice Table Styling */
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

            /* Total Calculation */
            .total {
                font-size: 18px;
                font-weight: 700;
                text-align: right;
                margin-top: 20px;
            }
        }

        /* No print styling */
        .no-print {
            display: none;
        }
    }
</style>

<div>
    <div id="invoice-print-area">
        <h2 style="text-align: center;">3P.Shop - Invoice</h2>

        <!-- User & Payment Info -->
        <p><strong>Customer Name:</strong> {{ $printpayment_first->user->name ?? 'N/A' }}</p>
        <p><strong>Payment Method:</strong> {{ $printpayment_first->payment_method ?? 'N/A' }}</p>
        <p><strong>Voucher No:</strong> {{ $printpayment_first->voucher_no }}</p>
        <p><strong>Date:</strong> {{ $printpayment_first->transation_date }}</p>

        <!-- Invoice Table -->
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
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

        <p><strong>Total:</strong> {{ number_format($payments->sum('total')) }}</p>
    </div>

    <!-- Print & PDF Buttons -->
    <div class="no-print">
        <a href="#" onclick="printInvoice()" class="btn btn-primary">Print</a>
    </div>
</div>

    <script>
        function printInvoice() {
            window.print();
        }
    </script>
@endsection