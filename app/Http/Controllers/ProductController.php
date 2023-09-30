<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }
}
