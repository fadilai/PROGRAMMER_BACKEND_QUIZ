<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Product;


class ProductController extends Controller
{
    //Mengambil data product
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    //Menyimpan data product
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

    //Menghapus data product
    public function destroy($id)
    {
        $customer = Product::find($id);

        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], Response::HTTP_NOT_FOUND);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully'], Response::HTTP_OK);
    }
}
