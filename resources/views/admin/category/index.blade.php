@extends('layouts.admin')
@section('content')

    <div class="container mt-5">
        <!-- Page Header -->
        <div class="my-3">
            <h1 class="mt-4 d-inline">Categories</h1>
            <a href="" class="btn btn-primary float-end">+ Create New</a>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">3P.Shop</li>
        </ol>
    
        <!-- Category Table -->
        <div class="card">
          <div class="card-header bg-light">
            <h5 class="mb-0">Category List</h5>
          </div>
          <div class="card-body p-0">
            <table class="table table-bordered mb-0">
              <thead class="table-light">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot class="table-light">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>
                <!-- Example Rows -->
                @php
                    $j = 1;
                @endphp
                @foreach ($categories as $category)
                  <tr>
                    <td>{{$j++}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-warning">Edit</a>
                      <form action="#" method="POST" class="d-inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                
                <!-- Add more rows dynamically from backend -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    
@endsection
    
