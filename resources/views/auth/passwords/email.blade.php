@extends('layouts.front')

@section('content')
<div class="d-flex justify-content-center align-items-center"
    style="min-height: 85vh; background: linear-gradient(135deg, #222, #2d2d2d); padding-top: 20px; padding-bottom: 20px;">
    <div class="col-md-5">
        <div class="card border-0 p-4"
            style="background: rgba(25, 25, 25, 0.95); border-radius: 12px; 
            box-shadow: 0 10px 25px rgba(0, 255, 0, 0.3);"> <!-- Green Soft Glow -->

            <div class="card-header bg-transparent border-0 text-center">
                <h3 class="text-white fw-bold">Reset Password</h3>
                <p class="text-secondary small">Enter your email and we'll send you a reset link</p>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <form id="reset-form" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email Address</label>
                        <input id="email" type="email" class="form-control bg-dark text-white border-0 shadow-sm"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            style="border-radius: 8px;">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn text-white fw-bold reset-btn"
                            style="background: linear-gradient(45deg, #4caf50, #2e7d32); border-radius: 8px;
                            transition: all 0.3s; box-shadow: 0 4px 10px rgba(0, 255, 0, 0.4);">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-success text-decoration-none small">Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
                    document.querySelector('.reset-btn').addEventListener('click', function(e) {
            e.preventDefault();  // Prevent form submission

            const email = document.getElementById('email').value;

            // Check if email is empty
            if (!email) {
                // Show error alert if email is empty
                Swal.fire({
                    icon: 'error',
                    title: 'Email Required',
                    text: 'Please enter your email address.',
                    confirmButtonText: 'Okay'
                });
            } else {
                // Show loading alert if email is provided
                Swal.fire({
                    title: 'Sending Password Reset Link...',
                    html: 'Please wait while we process your request.',
                    allowOutsideClick: false,  // Prevent clicking outside to close
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // After loading alert, submit the form
                setTimeout(function() {
                    // Submit the form
                    document.getElementById('reset-form').submit();
                }, 2000); // Adjust this time based on the desired delay
            }
        });
    </script>
@endsection
