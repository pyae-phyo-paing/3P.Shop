@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="row mt-3">
        <div class="col-lg-4 my-3">
            <h4 class="mt-4 d-inline">
                @if(Request::is('backend/payments'))
                 # Checking Payment List #
                @elseif(Request::is('backend/paid-payments'))
                 # Paid Payment List #
                @endif
            </h4>
        </div>
        <div class="col-lg-8 my-3">
            <a href="#" class="btn btn-primary mx-2 float-end">Refund Payment List</a>
            <a href="{{route('backend.paid-payments')}}" class="btn btn-success mx-2 float-end">Paid Payment List</a>
            <a href="{{route('backend.payments')}}" class="btn btn-secondary mx-2 float-end">Checking Payment List</a>
        </div>
    </div>
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Payments
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
    
                        @foreach($payment_data as $payment)
    
                            @if($payment != null)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$payment->voucher_no}}</td>
                                <td>{{$payment->user->name}}</td>
                                <td>
                                    <span class="badge @if($payment->status == 'Checking')
                                    {{'text-bg-secondary'}}
                                    @elseif($payment->status == 'Paid')
                                    {{'text-bg-success'}}
                                    @else
                                    {{'text-bg-success'}}
                                    @endif
                                    ">{{$payment->status}}</span>
                                </td>
                                <td>
                                    {{$payment->payment_method}}
                                </td>
                                <td>
                                    <a href="{{route('backend.payment-detial',$payment->voucher_no)}}" class="btn btn-sm btn-warning">Detail</a>
                                    @if ($payment->status == 'Paid')
                                    <a href="{{route('backend.print-payment',$payment->voucher_no)}}" class="btn btn-sm btn-primary">Print</a>
                                    @endif
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
