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
                <a class="btn w-25 go-shop-button" href="#" id="checkout-button">Continue to Checkout<i class="fas fa-arrow-right"></i></a>
            </div>
        @endguest
    </div>
</div> 
@endsection
@section('script')
<script>
    $(document).ready(function () {
        // localStorage ထဲမှာ "shops" key မရှိရင် Button ကို ပြမယ်
        if (!localStorage.getItem("shops")) {
            $("#checkout-button").hide(); // jQuery နဲ့ Show
        }

        $("#checkout-button").click(function (e) {
            e.preventDefault(); // Default Redirect ကို Prevent လုပ်မယ်

            // LocalStorage ထဲက "cart" Data ကို JSON Parse ပြုလုပ်မယ်
            let cart = JSON.parse(localStorage.getItem("shops")) || [];

            if (cart.length === 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Your cart is empty!",
                    text: "Please add some products before continuing shopping.",
                    confirmButtonColor: "#3085d6",
                });
                return;
            }

            // Cart Data ကို Ajax နဲ့ Laravel Controller ဆီကို ပို့မယ်
            $.ajax({
                url: "{{ route('check-stock') }}", // Laravel Route
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}", // CSRF Protection
                    cart: cart
                },
                success: function (response) {
                    if (response.status === "error") {
                        Swal.fire({
                            icon: "error",
                            title: "Stock Quantity Not Available!",
                            html: 'The quantity of <span style="color:red; font-weight: bold;">' + response.product_name + '</span> exceeds available stock!',
                            confirmButtonColor: "#d33"
                        });
                    } else {
                        window.location.href = "{{route('payment-info')}}"; // Stock အားလုံး လုံလောက်ရင် Redirect
                    }
                }
            });
        });
    });
</script>
@endsection

