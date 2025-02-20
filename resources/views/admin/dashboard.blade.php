@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4"><span class="text-success">3P.Shop</span> - Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Welcome to 3P.Shop Team!</li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="menu-header blue-card">
                <span><i class="fas fa-list"></i> Order List</span>
                <i class="fas fa-angle-down"></i>
            </div>
            <div class="menu-item">
                <span><i class="fas fa-check-circle text-success"></i> <a href="{{route('backend.order-list')}}" class="text-decoration-none">Completed Orders</a></span>
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="menu-description">
                📋 You can view and manage all completed orders.
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="menu-header green-card">
                <span><i class="fas fa-file-invoice-dollar"></i> Payment Vouchers</span>
                <i class="fas fa-angle-down"></i>
            </div>
            <div class="menu-item">
                <span><i class="fas fa-check-circle text-success"></i> <a href="{{route('backend.payment-list')}}" class="text-decoration-none">Paid Vouchers</a></span>
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="menu-description">
                💰 You can track, manage and print all paid payment vouchers.
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="menu-header orange-card">
                <span><i class="fas fa-box"></i> Product In-stock</span>
                <i class="fas fa-angle-down"></i>
            </div>
            <div class="menu-item">
                <span><i class="fas fa-box-open text-success"></i> <a href="{{route('backend.instock-list')}}" class="text-decoration-none">Instock Qty</a></span>
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="menu-description">
                📦 You can monitor and manage product instock quantities.
            </div>
        </div>
        
    </div>
    

</div>

@endsection
