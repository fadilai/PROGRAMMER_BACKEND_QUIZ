<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('addresses')->get();
        return response()->json(['data' => $customers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:50',
        ]);

        $customer = Customer::create([
            'customer_name' => $request->input('customer_name'),
        ]);

        return response()->json(['message' => 'Customer created successfully', 'customer' => $customer], 201);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], Response::HTTP_NOT_FOUND);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully'], Response::HTTP_OK);
    }
}
