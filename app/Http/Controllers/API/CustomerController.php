<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {

        try {
            //show data customer and address
            $customers = Customer::with('customerAddresses')->get();
            $data = CustomerResource::collection($customers);
            return response()->json([
                'data'=>$data,
                'message'=>'List Data Customer',
            ]);
        }catch (\Exception $exception){
            \Log::error('customer list',[$exception]);
            return response()->json([
                'message'=>'Server Error',
            ],400);
        }

    }
}
