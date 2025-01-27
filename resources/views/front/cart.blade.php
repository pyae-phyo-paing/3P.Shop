@extends('layouts.front')
@section('content')

<div class="container my-5 py-5">
    <h3 class="text-center py-3">My Shopping Carts</h3>
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
                    <th>Discount</th>
                    <th>Qty</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="mytable">
                
            </tbody>
        </table>
    </div>

    
</div>
@endsection
