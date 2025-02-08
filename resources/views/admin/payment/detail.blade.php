@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
<div class="my-5">
    <h3 class="my-4 d-inline">Payments Detail</h3>
    <a href="{{route('backend.payments')}}" class="btn btn-sm btn-danger float-end">Cancel</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h3 class="text-center text-success">3P.Shop</h3>

        <div class="row">
            <div class="col-md-6">
                <p>Name - {{$first_payment->user->name}} </p>
                <p>Phone - {{$first_payment->user->phone}} </p>
                <p>Voucher No - {{$first_payment->voucher_no}} </p>
                @if ($first_payment->payment_method == 'visa')
                    <p>Card Holder Name - {{$first_payment->card_holder_name}}</p> 
                @else
                    <p>Mobile Provider - {{$first_payment->mobile_provider}}</p>
                @endif
            </div>
            <div class="col-md-6 text-end">
                <p>Date - {{$first_payment->transation_date}}</p>
                <p>Address - {{$first_payment->user->address}} </p>
                <p>Payment Method - {{$first_payment->payment_method}} </p>
                @if ($first_payment->payment_method == 'visa')
                    <p>Card Number - {{$first_payment->card_number}}</p>
                @endif
            </div>
        </div>

        <table class="table table-bordered">
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
                @php 
                    $i = 1;
                    $total = 0;
                @endphp

                @foreach($payments as $payment)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$payment->product->name}}</td>
                        <td>{{$payment->product->price}}</td>
                        <td>{{$payment->product->discount}}</td>
                        <td>{{$payment->qty}}</td>
                        <td>{{$payment->total}}</td>
                    </tr>

                    @php 
                        $total += $payment->total;
                    @endphp

                @endforeach

                <tr>
                    <td colspan="5">Total</td>
                    <td>{{$total}}</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            @if ($first_payment->payment_method == 'mobile banking')
            <div class="offset-md-4 col-md-4">
                <img src="{{$first_payment->payment_slip}}" alt="" class="img-fluid">
            </div>
            @endif
            
            <form action="{{route('backend.payment-status',$first_payment->voucher_no)}}" class="d-grid gap-2 my-5" method="post" id="paidForm">
            @csrf 
            @method('put')
            @if($first_payment->status == 'Checking')
                <input type="hidden" name="status" value="Paid">
                <button class="btn btn-primary" type="submit" id="payButton">Paid</button>
            @endif
            </form>
        </div>
    </div>
</div>
</div>

@endsection
@section('script')
<script>
    document.getElementById('payButton').addEventListener('click', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to mark this payment as Paid?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Pay!",
            cancelButtonText: "No, Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('paidForm').submit();
            }
        });
    });
</script>
@endsection