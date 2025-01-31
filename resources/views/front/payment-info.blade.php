@extends('layouts.front')
@section('content')
<div class="container mt-5 mb-5">
    <div class="card shadow-lg p-4" style="border-radius: 15px; background-color: #f0fff0;">
        <h2 class="text-center text-success">Payment Information</h2>
        
        <form action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label for="payment_method" class="form-label fw-bold">Choose Payment Method:</label>
                <select id="payment_method" name="payment_method" class="form-select border-success">
                    <option value="">Select Payment Method</option>
                    <option value="visa">Visa/MasterCard</option>
                    <option value="mobile">Mobile Banking</option>
                </select>
            </div>

            <!-- Visa/MasterCard Form -->
            <div id="visa_form" class="payment-form" style="display: none;">
                <div class="mb-3">
                    <label class="form-label">Card Number</label>
                    <input type="text" name="card_number" class="form-control border-success" placeholder="**** **** **** ****">
                </div>
                <div class="mb-3">
                    <label class="form-label">Expiry Date</label>
                    <input type="text" name="expiry_date" class="form-control border-success" placeholder="MM/YY">
                </div>
                <div class="mb-3">
                    <label class="form-label">CVV</label>
                    <input type="text" name="cvv" class="form-control border-success" placeholder="***">
                </div>
            </div>

            <!-- Mobile Banking Form -->
            <div id="mobile_form" class="payment-form" style="display: none;">
                <div class="mb-3">
                    <label class="form-label">Mobile Banking Provider</label>
                    <select name="mobile_provider" class="form-select border-success" id="mobile_provider">
                        <option value="">Select Provider</option>
                        <option value="KBZ Pay">KBZ Pay</option>
                        <option value="Wave Money">Wave Money</option>
                        <option value="uab Pay">uab Pay</option>
                    </select>
                </div>
                <!-- QR Code Display -->
                <div id="qr_code_section" class="text-center mt-3" style="display: none;">
                    <h5 class="text-success">Scan to Pay</h5>
                    <img id="qr_code_img" src="" alt="QR Code" class="img-fluid shadow-lg rounded" style="max-width: 200px;">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control border-success" placeholder="09xxxxxxxxx">
                </div>

            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Submit Payment</button>
        </form>
    </div>
</div> 

@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#payment_method').change(function(){
            $('.payment-form').hide();
            let selectedMethod = $(this).val();
            if(selectedMethod == 'visa'){
                $('#visa_form').fadeIn();
            } else if(selectedMethod == 'mobile'){
                $('#mobile_form').fadeIn();
            }
        });

        $('#mobile_provider').change(function(){
            let provider = $(this).val();
            let qrImage = "";

            if(provider == "KBZ Pay"){
                qrImage = "{{ asset('front-assets/assets/img/kpay_scan.jpg') }}";  // KBZ Pay QR Code
            } else if(provider == "Wave Money"){
                qrImage = "{{ asset('front-assets/assets/img/wavepay_scan.jpg') }}";  // Wave Money QR Code
            } else if(provider == "uab Pay"){
                qrImage = "{{ asset('front-assets/assets/img/uab_pay.jpg') }}";
            }

            if(qrImage){
                $('#qr_code_img').attr('src', qrImage);
                $('#qr_code_section').fadeIn();
            } else {
                $('#qr_code_section').hide();
            }
        });
    });
</script>
@endsection