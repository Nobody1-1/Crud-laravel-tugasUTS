@extends('products.main')

@section('container')
    <div class='container mt-4'>
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

        <h2>Product Saya</h2>
                <a href="/products/create" class="btn btn-warning mb-2">Add Product</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Product</th>
                                <th>Category</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $i = 1;
                            @endphp
                
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $product->nama_product }}</td>
                                    @foreach($category_products as $category_product)
                                            @if($category_product->id == $product->category_id)
                                                <td>{{ $category_product->nama_category }}</td>
                                            @endif
                                    @endforeach
                                    <td>{{ number_format($product->harga,0,',','.') }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->deskripsi }}</td>
                                    <td>
                
                                        <a href="/products/{{ $product->id }}/edit" class="btn btn-sm btn-info">Edit</a>
                
                                        <form action="/products/{{ $product->id }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                        </tbody>
                    </table>
    </div>

@endsection