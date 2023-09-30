<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CustomerAddressController extends Controller
{
   // Mengambil daftar alamat pelanggan berdasarkan customer_id
   public function index($customer_id)
   {
       $customerAddresses = CustomerAddress::where('customer_id', $customer_id)->get();
       return response()->json(['data' => $customerAddresses], Response::HTTP_OK);
   }

   // Menyimpan alamat pelanggan baru
   public function store(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'customer_id' => 'required|exists:customers,id',
           'address' => 'required|string|max:255',
       ]);

       if ($validator->fails()) {
           return response()->json(['error' => $validator->errors()], Response::HTTP_BAD_REQUEST);
       }

       $customerAddress = CustomerAddress::create([
           'customer_id' => $request->input('customer_id'),
           'address' => $request->input('address'),
       ]);

       return response()->json(['data' => $customerAddress], Response::HTTP_CREATED);
   }

   // Menghapus alamat pelanggan
   public function destroy($id)
   {
       $customerAddress = CustomerAddress::find($id);

       if (!$customerAddress) {
           return response()->json(['error' => 'Customer Address not found'], Response::HTTP_NOT_FOUND);
       }

       $customerAddress->delete();

       return response()->json(['message' => 'Customer Address deleted successfully'], Response::HTTP_OK);
   }

}
