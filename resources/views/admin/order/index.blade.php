@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="row mt-3">
        
        <div class="col-lg-8 my-3">
            <a href="{{route('backend.order-complete')}}" class="btn btn-primary mx-2 float-end">Order Complete List</a>
            <a href="{{route('backend.order-shipping')}}" class="btn btn-warning mx-2 float-end">Order Shipping List</a>
            <a href="{{route('backend.orders')}}" class="btn btn-secondary mx-2 float-end">Order Accept List</a>
        </div>
    </div>
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Orders
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Voucher No</th>
                            <th>User Name</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Voucher No</th>
                            <th>User Name</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php 
                            $i = 1;
                        @endphp
    
                        @foreach($order_data as $order)
    
                            @if($order != null)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order->voucher_no}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>
                                    <span class="badge @if($order->status == 'Accept')
                                    {{'text-bg-secondary'}}
                                    @elseif($order->status == 'Shipping')
                                    {{'text-bg-warning'}}
                                    @elseif($order->status == 'Complete')
                                    {{'text-bg-success'}}
                                    @endif
                                    ">{{$order->status}}</span>
                                </td>
                                <td>
                                    {{$order->payment_method}}
                                </td>
                                <td>
                                    <a href="{{route('backend.order-detail',$order->voucher_no)}}" class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                            @endif
    
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

@endsection
