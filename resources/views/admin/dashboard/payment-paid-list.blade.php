@extends('layouts.admin')
@section('content')
<div class="container mt-5">
    <div class="my-3">
        <h2 class="text-center mb-4 d-inline">💳 Payment Paid List</h2>
        <a onclick="window.history.back();" class="btn btn-sm btn-danger float-end">Cancel</a>
    </div>
    
    <div class="card p-3">
        <table id="orderTable" class="table table-striped">
            <thead>
                <tr>
                    <th>📜 Voucher No</th>
                    <th>👤 User Name</th>
                    <th>📅 Order Complete Date</th>
                    <th>🔍 Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->voucher_no }}</td>
                        <td>{{ $payment->user->name ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($payment->transation_date)->format('Y-m-d') ?? '-' }}</td>
                        <td>
                            <a href="{{route('backend.payment-detial',$payment->voucher_no)}}" class="btn btn-sm btn-warning">Detail</a>
                            @if ($payment->status == 'Paid')
                            <a href="{{route('backend.print-payment',$payment->voucher_no)}}" class="btn btn-sm btn-primary">Print</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dataTable = new simpleDatatables.DataTable("#orderTable", {
            searchable: true,
            fixedHeight: true
        });
    });
</script>
@endsection