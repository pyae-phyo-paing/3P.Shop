@extends('layouts.admin')
@section('content')
    <div class="container py-3">
        <!-- Page Header -->
        <div class="my-3 px-3">
            <h3 class="mt-4 d-inline">Create Category</h3>
            <a href="{{route('backend.category.index')}}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <ol class="breadcrumb mb-4 px-3">
            <li class="breadcrumb-item"><a href="#">Category List</a></li>
            <li class="breadcrumb-item active">3P.Shop</li>
        </ol>

        <div class="card">
            <div class="card-header bg-light">
              <h5 class="mb-0">Category</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{route('backend.category.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{old('description')}}</textarea>
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