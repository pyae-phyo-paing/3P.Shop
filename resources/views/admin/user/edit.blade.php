@extends('layouts.admin')
@section('content')
    <div class="container py-3">
        <!-- Page Header -->
        <div class="my-3 px-3">
            <h3 class="mt-4 d-inline">Edit User</h3>
            <a href="{{route('backend.user.index')}}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <ol class="breadcrumb mb-4 px-3">
            <li class="breadcrumb-item"><a href="{{route('backend.user.index')}}">Category List</a></li>
            <li class="breadcrumb-item active">3P.Shop</li>
        </ol>

        <div class="card">
            <div class="card-header bg-light">
              <h5 class="mb-0">Edit User</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{route('backend.user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$user->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$user->phone}}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$user->email}}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="old_profile-tab" data-bs-toggle="tab" data-bs-target="#old_profile-tab-pane" type="button" role="tab" aria-controls="old_profile-tab-pane" aria-selected="true">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="new_profile-tab" data-bs-toggle="tab" data-bs-target="#new_profile-tab-pane" type="button" role="tab" aria-controls="new_profile-tab-pane" aria-selected="false">New</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="old_profile-tab-pane" role="tabpanel" aria-labelledby="old_profile-tab" tabindex="0">
                                <img src="{{$user->profile}}" alt="" width="400px" class="mx-2 my-2">
                                <input type="hidden" name="old_profile" id="" value="{{$user->profile}}">
                            </div>
                            <div class="tab-pane fade" id="new_profile-tab-pane" role="tabpanel" aria-labelledby="new_profile-tab" tabindex="0">
                                <img id="previewImage" class="preview" alt="Selected Image Preview">
                                <input type="file" class="form-control my-3" accept="image/*" id="imageUpload" name="profile">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{$user->address}}">
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                            <select name="role" id="" class="form-select @error('role') is-invalid @enderror">
                                <option value="">Choose role</option>
                                <option value="User" {{$user->role == 'User' ? 'selected':'';}}>User</option>
                                <option value="Staff" {{$user->role == 'Staff' ? 'selected':'';}}>Staff</option>
                                <option value="Admin" {{$user->role == 'Admin' ? 'selected':'';}}>Admin</option>
                                <option value="Super Admin" {{$user->role == 'Super Admin' ? 'selected':'';}}>Super Admin</option>
                            </select>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                      <button type="submit" class="btn btn-primary w-100">Update</button>
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