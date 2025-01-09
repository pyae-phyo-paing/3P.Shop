@extends('layouts.admin')
@section('content')
    
    <div class="container my-4">
        <h2 class="text-center mb-4">Categories Table</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Parent Category</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Electronics</td>
                    <td>Devices and gadgets</td>
                    <td>None</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Mobiles</td>
                    <td>Smartphones and accessories</td>
                    <td>Electronics</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Clothing</td>
                    <td>Men and Women fashion</td>
                    <td>None</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Laptops</td>
                    <td>Work and gaming laptops</td>
                    <td>Electronics</td>
                </tr>
            </tbody>
        </table>
    </div>
    
@endsection
    
