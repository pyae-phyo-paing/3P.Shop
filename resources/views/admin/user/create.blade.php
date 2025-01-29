@extends('layouts.admin')
@section('content')
    <div class="container py-3">
        <!-- Page Header -->
        <div class="my-3 px-3">
            <h3 class="mt-4 d-inline">Create User</h3>
            <a href="{{route('backend.user.index')}}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <ol class="breadcrumb mb-4 px-3">
            <li class="breadcrumb-item"><a href="{{route('backend.user.index')}}">Category List</a></li>
            <li class="breadcrumb-item active">3P.Shop</li>
        </ol>

        <div class="card">
            <div class="card-header bg-light">
              <h5 class="mb-0">User</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{route('backend.user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('phone')}}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label">Profile</label>
                        <img id="previewImage" class="preview" alt="Selected Image Preview">
                        <input type="file" class="form-control @error('profile') is-invalid @enderror" accept="image/*" id="imageUpload" name="profile" value="{{old('profile')}}">
                        @error('profile')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{old('address')}}">
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                            <select name="role" id="" class="form-select @error('role') is-invalid @enderror">
                                <option value="">Choose role</option>
                                <option value="User">User</option>
                                <option value="Staff">Staff</option>
                                <option value="Admin">Admin</option>
                                <option value="Super Admin">Super Admin</option>
                            </select>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                      <button type="submit" class="btn btn-primary w-100">Save</button>
                </form>
            </div>

        </div>


    </div>
@endsection
@section('script')
<script>
    const imageInput = document.getElementById('imageUpload');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('change', function(event) {
        const file = event.target.files[0]; // Get the selected file
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result; // Set the image source
                previewImage.style.display = 'block'; // Show the image
            };
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            previewImage.style.display = 'none'; // Hide the image if no file
        }
    });
</script>
@endsection