@extends('layouts.admin')
@section('content')
    <div class="container py-3">
        <!-- Page Header -->
        <div class="my-3 px-3">
            <h3 class="mt-4 d-inline">Create Product</h3>
            <a href="{{route('backend.product.index')}}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <ol class="breadcrumb mb-4 px-3">
            <li class="breadcrumb-item"><a href="{{route('backend.product.index')}}">Product List</a></li>
            <li class="breadcrumb-item active">3P.Shop</li>
        </ol>

        <div class="card">
            <div class="card-header bg-light">
              <h5 class="mb-0">Product</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{route('backend.product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="code_no" class="form-label">Code No.</label>
                        <input type="text" class="form-control @error('code_no') is-invalid @enderror" id="code_no" name="code_no" value="{{old('code_no')}}">
                        @error('code_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <img id="previewImage" class="preview" alt="Selected Image Preview">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" accept="image/*" id="imageUpload" name="image" value="{{old('image')}}">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')}}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{old('discount')}}">
                        @error('discount')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="instock" class="form-label">Instock</label>
                        <input type="text" class="form-control @error('instock') is-invalid @enderror" id="instock" name="instock" value="{{old('instock')}}">
                        @error('instock')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Brand</label>
                            <select name="brand_id" id="" class="form-select @error('brand_id') is-invalid @enderror">
                                <option value="">Choose brand type</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" {{old('brand_id') == $brand->id ? 'selected':'';}}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        @error('brand_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="" class="form-select @error('category_id') is-invalid @enderror">
                                <option value="">Choose category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected':'';}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="@error('description') is-invalid @enderror" id="summernote" name="description">{{ str_replace('<p></p>', '', old('description')) }}</textarea>
                        @error('description')
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
        $('#summernote').summernote({
        placeholder: 'Write your product description!',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
        });

    </script>
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