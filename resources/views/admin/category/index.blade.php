@extends('layouts.admin')
@section('content')

    <div class="container mt-5">
        <!-- Page Header -->
        <div class="my-3">
            <h1 class="mt-4 d-inline">Categories</h1>
            <a href="{{route('backend.category.create')}}" class="btn btn-primary float-end">+ Create New</a>
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
                      <button type="button" class="btn btn-sm btn-danger delete" data-id="{{$category->id}}">Delete</button>
                    </td>
                  </tr>
                @endforeach
                
                <!-- Add more rows dynamically from backend -->
              </tbody>
            </table>
          </div>
        </div>
      </div>


    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
          $('tbody').on('click','.delete',function(){
            // alert('Hello');
            let id = $(this).data('id');
            // console.log(id);

            $('#deleteModal').modal('show');
            
          })
        })
    </script>
@endsection
    
