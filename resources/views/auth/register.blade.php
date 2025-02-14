@extends('layouts.front')

@section('content')

<div class="register-body">
    <div class="form-container">
        <h2>Create an Account</h2>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" placeholder="Enter your phone number">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Enter your password">
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" placeholder="Confirm your password">
        </div>
        
        <div class="form-group">
            <label>Profile Picture</label>
            <img id="profile-preview" class="image-preview" alt="Profile Preview">
            <div class="file-input-wrapper">
                <label for="profile-pic" class="file-label">Choose File</label>
                <span class="file-name">No file chosen</span>
                <input type="file" id="profile-pic" accept="image/*" onchange="previewImage()">
            </div>
        </div>
    
        <button class="submit-btn">Create Account</button>
    </div>
</div>


@endsection
@section('script')
<script>
    function previewImage() {
        const input = document.getElementById("profile-pic");
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
