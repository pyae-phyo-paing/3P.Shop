@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    
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
                                {{'text-bg-primary'}}
                                @else
                                {{'text-bg-success'}}
                                @endif
                                ">{{$payment->status}}</span>
                            </td>
                            <td>
                                {{$payment->payment_method}}
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                        </tr>
                        @endif

                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection
