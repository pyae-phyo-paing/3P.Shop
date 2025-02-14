@extends('layouts.front')

@section('content')

<div class="register-body">
    <div class="form-container">
        <h2>Create an Account</h2>
    
        <!-- Form Start -->
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{old('name')}}" class="@error('name') is-invalid @enderror" placeholder="Enter your name" required>
                @error('name')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" class="@error('email') is-invalid @enderror" placeholder="Enter your email" required>
                @error('email')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="@error('phone') is-invalid @enderror" placeholder="Enter your phone number" required>
                @error('phone')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" placeholder="Enter your password" required>
                @error('password')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="password_confirmation" id="confirm-password" class="@error('confirm-password') is-invalid @enderror" placeholder="Confirm your password" required>
                @error('confirm-password')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{old('address')}}" class="@error('address') is-invalid @enderror" placeholder="Enter your address" required>
                @error('address')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Profile Picture</label>
                <img id="profile-preview" class="image-preview" alt="Profile Preview">
                <div class="file-input-wrapper">
                    <label for="profile" class="file-label">Choose File</label>
                    <span class="file-name">No file chosen</span>
                    <input type="file" name="profile" id="profile" class="@error('profile') is-invalid @enderror" accept="image/*" onchange="previewImage()">
                </div>
                @error('profile')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <input type="hidden" name="role" id="" value="User">
    
            <button type="submit" class="submit-btn">Create Account</button>
        </form>
    </div>
</div>


@endsection
@section('script')
<script>
    function previewImage() {
        const input = document.getElementById("profile");
        const fileNameDisplay = document.querySelector(".file-name");
        const preview = document.getElementById("profile-preview");

        if (input.files.length > 0) {
            const file = input.files[0];
            fileNameDisplay.textContent = file.name;

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block"; // ရွေးပြီးတာနဲ့ပဲ ပြ
            };
            reader.readAsDataURL(file);
        } else {
            fileNameDisplay.textContent = "No file chosen";
            preview.src = "";
            preview.style.display = "none"; // မရွေးရင်ပြန်ဖျောက်
        }
    }

</script>
@endsection
