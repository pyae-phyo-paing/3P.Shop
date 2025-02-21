@extends('layouts.front')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('user-profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="text-center mb-4">
                            <img id="profilePreview" src="{{ $user->profile }}" class="rounded-circle border border-success p-1" width="120" height="120" alt="Profile Picture">
                            <input type="hidden" name="old_profile" id="" value="{{$user->profile}}">
                            <input type="file" name="profile" class="form-control mt-3" onchange="previewImage(event)">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="address">Address</label>
                            <textarea name="address" class="form-control" rows="3" required>{{ $user->address }}</textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profilePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection