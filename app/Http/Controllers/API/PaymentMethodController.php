<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentMethodResource;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
        try {
            //show data product
            $products = PaymentMethod::whereIsActive(true)->get();
            $data = PaymentMethodResource::collection($products);
            return response()->json([
                'data'=>$data,
                'message'=>'List Data Payment Method',
            ]);
        }catch (\Exception $exception){
            \Log::error('Payment Method list',[$exception]);
            return response()->json([
                'message'=>'Server Error',
            ],400);
        }
    }
}
