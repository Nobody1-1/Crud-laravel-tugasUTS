@extends('products.main')
@section('container')
    <div class="py2 m-2 px-4">
        <h2>Edit Mahasiswa</h2>
        <form action="/products/{{ $products->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group" style="max-width: 40%;">
                <label for="nama_product">Name:</label>
                <input type="text" name="nama_product" class="form-control" value="{{ $products->nama_product }}" placeholder="Enter name">
            </div>
            <div class="form-group" style="max-width: 40%;">
                <label for="harga">Harga</label>
                <input type="text" name="harga" class="form-control" value="{{ number_format($products->harga,0,',','') }}" placeholder="Enter Harga">
            </div>
            <div class="form-group" style="max-width: 40%;">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($category_products as $category_product)
                            <option value="{{ $category_product->id }}" @if($category_product->id == $products->category_id) selected @endif>
                                {{ $category_product->nama_category }}
                            </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="max-width: 40%;">
                <label for="stock">Stock</label>
                <input type="text" name="stock" class="form-control" value="{{ $products->stock}}" placeholder="Enter Harga">
            </div>
            <div class="form-group" style="max-width: 40%;">
                <label for="deskripsi">Description:</label>
                <textarea name="deskripsi" class="form-control" placeholder="Enter description">{{ $products->deskripsi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
    </div>
@endsection

