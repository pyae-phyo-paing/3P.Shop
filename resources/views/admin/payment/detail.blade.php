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
                <p>Mailing Address - {{$first_payment->address}}</p>
            </div>
            <div class="col-md-6 text-end">
                <p>Date - {{$first_payment->transation_date}}</p>
                <p>Address - {{$first_payment->user->address}} </p>
                <p>Payment Method - {{$first_payment->payment_method}} </p>
                @if ($first_payment->payment_method == 'visa')
                    <p>Card Number - {{$first_payment->card_number}}</p>
                @endif
                @if ($first_payment->note)
                    <p>Note - {{$first_payment->note}}</p>
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
                    <img src="{{$first_payment->payment_slip}}" alt="Click to Zoom" class="img-fluid" id="zoom-img" style="cursor: pointer;">
            </div>
            @endif
            
            @if ($first_payment->status != 'Paid')
            <form id="payment-form" action="{{route('backend.payment-status',$first_payment->voucher_no)}}" class="d-grid gap-2 my-5" method="post">
                @csrf 
                @method('put')
                @if($first_payment->status == 'Checking')
                    <input type="hidden" name="status" value="Paid">
                    <button id="paid-btn" class="btn btn-primary" type="button">Paid</button>
                @endif
            </form>
            @endif
        </div>
    </div>
</div>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img src="" id="modal-img" class="img-fluid">
        </div>
      </div>
    </div>
  </div>


@endsection
@section('script')
<script>
    $(document).ready(function () {
        $("#paid-btn").click(function () {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you really want to mark this as Paid?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, mark as Paid!",
                cancelButtonText: "No, cancel!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#payment-form").submit();
                }
            });
        });

        $("#zoom-img").click(function () {
            let imgSrc = $(this).attr("src");
            $("#modal-img").attr("src", imgSrc);
            $("#imageModal").modal("show");
        });
    });
</script>
@endsection