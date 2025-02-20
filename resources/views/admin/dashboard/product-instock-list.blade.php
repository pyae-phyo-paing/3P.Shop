@extends('layouts.admin')
@section('content')
<div class="container mt-5">
    <div class="my-3">
        <h2 class="text-center mb-4 d-inline">✔️ Product Instock List</h2>
        <a onclick="window.history.back();" class="btn btn-sm btn-danger float-end">Cancel</a>
    </div>
    
    <div class="card p-3">
        <table id="orderTable" class="table table-striped">
            <thead>
                <tr>
                    <th>📛 Name</th>
                    <th>🏷️ Brand</th>
                    <th>✅ Instock</th>
                    <th>📂 Category</th>
                    <th>⚙️ Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand->name ?? '-' }}</td>
                        <td>{{ $product->instock  }}</td>
                        <td>{{ $product->category->name}}</td>
                        <td>
                            <a href="{{route('backend.product.edit',$product->id)}}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dataTable = new simpleDatatables.DataTable("#orderTable", {
            searchable: true,
            fixedHeight: true
        });
    });
</script>
@endsection