@extends('layouts.front')
@section('content')

<div class="container my-5 py-5">
    <div class="row">
        <h3 class="text-center py-3">Order Summary</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody id="mytable">
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        @guest
            <a href="/login" class="signup-button"><button class="w-100" style="background: linear-gradient(45deg, #a8e6cf, #dcedc1); color: #333; padding: 12px 24px; border: none; border-radius: 30px; font-size: 16px; font-weight: bold; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">
                <i class="fas fa-user-plus"></i> Sign in
            </button></a>
        @else
            <div class="go-to-payment-btn">
                <a class="btn w-25 go-shop-button" href="{{route('payment-info')}}">Continue to Checkout<i class="fas fa-arrow-right"></i></a>
            </div>
        @endguest
    </div>
</div> 
@endsection

