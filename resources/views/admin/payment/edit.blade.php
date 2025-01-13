@extends('layouts.admin')
@section('content')
    <div class="container py-3">
        <!-- Page Header -->
        <div class="my-3 px-3">
            <h3 class="mt-4 d-inline">Edit Payment</h3>
            <a href="{{route('backend.payment.index')}}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <ol class="breadcrumb mb-4 px-3">
            <li class="breadcrumb-item"><a href="{{route('backend.payment.index')}}">Payment List</a></li>
            <li class="breadcrumb-item active">3P.Shop</li>
        </ol>

        <div class="card">
            <div class="card-header bg-light">
              <h5 class="mb-0">Edit Payment</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{route('backend.payment.update',$payment->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <input type="text" class="form-control @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" value="{{$payment->payment_method}}">
                        @error('payment_method')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="old_logo-tab" data-bs-toggle="tab" data-bs-target="#old_logo-tab-pane" type="button" role="tab" aria-controls="old_logo-tab-pane" aria-selected="true">Logo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="new_logo-tab" data-bs-toggle="tab" data-bs-target="#new_logo-tab-pane" type="button" role="tab" aria-controls="new_logo-tab-pane" aria-selected="false">New</button>
                            </li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="old_logo-tab-pane" role="tabpanel" aria-labelledby="old_logo-tab" tabindex="0">
                                <img src="{{$payment->logo}}" alt="" width="400px" class="mx-2 my-2">
                                <input type="hidden" name="old_logo" id="" value="{{$payment->logo}}">
                            </div>
                            <div class="tab-pane fade" id="new_logo-tab-pane" role="tabpanel" aria-labelledby="new_logo-tab" tabindex="0">
                                <img id="previewImage" class="preview" alt="Selected Image Preview">
                                <input type="file" class="form-control my-3 @error('logo') is-invalid @enderror" accept="image/*" id="imageUpload" name="logo" value="{{old('logo')}}">
                            </div>
                          </div>
                        @error('logo')
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