@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
<div class="my-5">
    <h3 class="my-4 d-inline">Order Detail</h3>
    <a href="{{route('backend.orders')}}" class="btn btn-sm btn-danger float-end">Cancel</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h3 class="text-center text-success">3P.Shop</h3>

        <div class="row">
            <div class="col-md-6">
                <p>Name - {{$first_order->user->name}} </p>
                <p>Phone - {{$first_order->user->phone}} </p>
                <p>Voucher No - {{$first_order->voucher_no}} </p>
                @if ($first_order->payment_method == 'visa')
                    <p>Card Holder Name - {{$first_order->card_holder_name}}</p> 
                @else
                    <p>Mobile Provider - {{$first_order->mobile_provider}}</p>
                @endif
                <p>Mailing Address - {{$first_order->address}}</p>
            </div>
            <div class="col-md-6 text-end">
                @if ($first_order->status == 'Accept')
                    <p>Accept Date - {{$first_order->order_accept_date}}</p>
                @elseif($first_order->status == 'Shipping')
                    <p>Shipping Date - {{$first_order->order_shipping_date}}</p>
                @elseif($first_order->status == 'Complete')
                    <p>Complete Date - {{$first_order->order_complete_date}}</p>
                @endif
                <p>Address - {{$first_order->user->address}} </p>
                <p>Payment Method - {{$first_order->payment_method}} </p>
                @if ($first_order->payment_method == 'visa')
                    <p>Card Number - {{$first_order->card_number}}</p>
                @endif
                @if ($first_order->note)
                    <p>Note - {{$first_order->note}}</p>
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

                @foreach($orders as $order)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$order->product->name}}</td>
                        <td>{{ $order->price ?? $order->product->price }}</td>
                        <td>{{ $order->discount ?? $order->product->discount }}</td>
                        <td>{{$order->qty}}</td>
                        <td>{{$order->total}}</td>
                    </tr>

                    @php 
                        $total += $order->total;
                    @endphp

                @endforeach

                <tr>
                    <td colspan="5">Total</td>
                    <td>{{$total}}</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            @if ($first_order->payment_method == 'mobile banking')
            <div class="offset-md-4 col-md-4">
                    <img src="{{$first_order->payment_slip}}" alt="Click to Zoom" class="img-fluid" id="zoom-img" style="cursor: pointer;">
            </div>
            @endif
            
            @if ($first_order->status != 'Complete')
                <form id="order-status-form" action="{{route('backend.order-status',$first_order->voucher_no)}}" class="d-grid gap-2 my-5" method="POST">
                    @csrf 
                    @method('PUT')
                    @if($first_order->status == 'Accept')
                        <input type="hidden" name="status" value="Shipping">
                        <button class="btn btn-primary status-ok" type="button">Order Shipping</button>
                    @else
                        <input type="hidden" name="status" value="Complete">
                        <button class="btn btn-primary status-ok" type="button">Order Complete</button>
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
        $(".status-ok").click(function () {
            let nextStatus = "{{ $first_order->status == 'Accept' ? 'Ship' : ($first_order->status == 'Shipping' ? 'Complete' : 'Accept') }}";

        console.log("Next Status: " + nextStatus); // Debugging Log

        Swal.fire({
            title: "Are you sure?",
            text: "Do you really want to mark this as " + nextStatus + "?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, mark as " + nextStatus + "!",
            cancelButtonText: "No, cancel!",
        }).then((result) => {
            if (result.isConfirmed) {
                $("#order-status-form").submit();
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