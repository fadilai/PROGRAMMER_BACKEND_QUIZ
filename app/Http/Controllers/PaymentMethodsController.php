<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class PaymentMethodsController extends Controller
{
// Mengambil daftar metode pembayaran
public function index()
{
    $paymentMethods = PaymentMethods::all();
    return response()->json(['data' => $paymentMethods], Response::HTTP_OK);
}

// Menyimpan metode pembayaran baru
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'is_active' => 'boolean',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], Response::HTTP_BAD_REQUEST);
    }

    $paymentMethod = PaymentMethods::create([
        'name' => $request->input('name'),
        'is_active' => $request->input('is_active', true), // Nilai default true jika tidak ada input
    ]);

    return response()->json(['data' => $paymentMethod], Response::HTTP_CREATED);
}

// Menghapus metode pembayaran
public function destroy($id)
{
    $paymentMethod = PaymentMethods::find($id);

    if (!$paymentMethod) {
        return response()->json(['error' => 'Payment Method not found'], Response::HTTP_NOT_FOUND);
    }

    $paymentMethod->delete();

    return response()->json(['message' => 'Payment Method deleted successfully'], Response::HTTP_OK);
}
}
