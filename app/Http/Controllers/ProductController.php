<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'photo_url' => 'required|string',
        ]);

        return Product::create($request->all());
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'photo_url' => 'required|string',
        ]);

        $product = Product::find($id);

        $product->update($request->all());

        return $product;
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        return Product::delete($id);
    }

    public function search($query)
    {
        return Product::where('name', 'like', '%'.$query.'%')->get();
    }
}
