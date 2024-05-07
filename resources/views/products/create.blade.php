@extends('products.main')
@section('container')
    <div class='m-2 py-2 px-4'>

        <h2>Add Product</h2>
            <form action="/products" method="POST">
                @csrf
                <div class="form-group" style="max-width: 40%;">
                    <label for="nama_product">Nama Product</label>
                    <input type="text" name="nama_product" class="form-control" placeholder="Enter Nama product">
                </div>
                <div class="form-group" style="max-width: 40%;">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" class="form-control" placeholder="Enter Harga">
                </div>
                <div class="form-group" style="max-width: 40%;">
                    <label for="category_id">Category:</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($category_products as $category_product)
                        <option value="{{ $category_product->id }}" selected>
                            {{ $category_product->nama_category }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="max-width: 40%;">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" class="form-control" placeholder="Enter Stock">
                </div>
                <div class="form-group" style="max-width: 40%;">
                    <label for="deskripsi">Description:</label>
                    <textarea name="deskripsi" class="form-control" placeholder="Enter description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
@endsection