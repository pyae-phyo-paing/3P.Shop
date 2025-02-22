@extends('layouts.front')
@section('content')
<div class="container mt-5 mb-5">
    <div class="card shadow-lg p-4" style="border-radius: 15px; background-color: #f0fff0;">
        <h2 class="text-center text-success">Payment Information</h2>
        
        <form action="" enctype="multipart/form-data" id="payment-form">
            @csrf
            <div class="mb-3">
                <label for="payment_method" class="form-label fw-bold">Choose Payment Method:</label>
                <select id="payment_method" name="payment_method" class="form-select border-success">
                    <option value="">Select Payment Method</option>
                    <option value="visa">Visa/MasterCard</option>
                    <option value="mobile banking">Mobile Banking</option>
                </select>
            </div>

            <!-- Visa/MasterCard Form -->
            <div id="visa_form" class="payment-form" style="display: none;">
                <div class="mb-3">
                    <label class="form-label" for="card_number">Card Number</label>
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
                <div class="mb-3">
                    <label class="form-label" for="card_holder_name">Card Owner Name</label>
                    <input type="text" name="card_holder_name" class="form-control border-success">
                </div>
            </div>

            <!-- Mobile Banking Form -->
            <div id="mobile_form" class="payment-form" style="display: none;">
                <div class="mb-3">
                    <label class="form-label" for="mobile_provider">Mobile Banking Provider</label>
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
                    <label class="form-label" for="payment_slip">Payment Slip</label>
                    <input type="file" name="payment_slip" class="form-control border-success">
                </div>

            </div>

            <!-- Common Inputs for All Payments -->
            <div class="mb-3">
                <label class="form-label" for="address">Mailing Address <span class="text-danger">*</span></label>
                <input type="text" name="address" class="form-control border-success" placeholder="Enter your address">
            </div>

            <div class="mb-3">
                <label class="form-label" for="note">Additional Note (Optional)</label>
                <textarea name="note" class="form-control border-success" rows="3" placeholder="Any additional notes..."></textarea>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3" id="payment-submit">Submit Payment</button>
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
            } else if(selectedMethod == 'mobile banking'){
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#payment-form').on('submit',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            console.log(formData);

            let itemstring = localStorage.getItem('shops');
            formData.append('orderItems',itemstring);
            //processData: false,
            //contentType: false,
            //ဒီနှစ်ခုက Form Data သယ်ဖို့
            let submitBtn = $('#payment-submit');
            // **SweetAlert2 Loading Dialog ပြ**
            Swal.fire({
                title: 'Processing Payment...',
                html: '<div class="spinner"></div><br> Please wait while we process your payment.',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{route('payment-submit')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);

                    if(response){
                        Swal.fire({
                        title: 'Your Orders Successful!',
                        html: 'Thank you for shopping with us. <br> We hope to see you again soon! <br> Please Check your email.',
                        icon: 'success',
                        confirmButtonText: 'Continue Shopping',
                        allowOutsideClick: false, // User က Dialog အပြင်မှာ နှိပ်ရင် မပျောက်အောင်
                        allowEscapeKey: false,    // ESC Key ကို နှိပ်လည်း မပျောက်အောင်
                        customClass: {
                            popup: 'custom-popup',
                            title: 'custom-title',
                            htmlContainer: 'custom-html-container',
                            confirmButton: 'custom-confirm-button',
                            icon: 'custom-icon'
                        }
                        }).then(() => {  // User က Confirm Button ကို နှိပ်မှ next step သွားမယ်
                            localStorage.clear('shops'); // 'shops' ဆိုပြီး Key ကို clear မလုပ်ရဘူး
                            location.href= '/'; // Page Redirect ကို User Confirm Button နှိပ်မှလုပ်မယ်
                        });
                           
                    }
                    
                },
                error: function() {
                    Swal.fire({
                        title: 'Payment Failed!',
                        text: 'Something went wrong. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }

            })
            
        })
    });
</script>
@endsection