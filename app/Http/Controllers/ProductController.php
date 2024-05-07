<?php

namespace App\Http\Controllers;

use App\Models\CategoryProducts;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        $category_products = CategoryProducts::all(); 
        return view('products.index',compact('products','category_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category_products = CategoryProducts::all();
        return view('products.create',compact('category_products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'harga' => 'required',
            'stock' => 'required|numeric|min:0',
            'deskripsi' => 'required',
            'category_id' => 'required'

        ]);

        Products::create($request->all());

        return redirect()->route('products.index')->with('success','product created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Products::find($id);
        $category_products = CategoryProducts::all();
        return view('products.edit',compact('products','category_products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'harga' => 'required',
            'stock' => 'required|numeric|min:0',
            'deskripsi' => 'required'
        ]);
        
        $product = Products::find($id);
        $product->update([
            'nama_product' => $request->nama_product,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('products.index')->with('success','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
