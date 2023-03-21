<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        try {
            //show data product
            $products = Product::all();
            $data = ProductResource::collection($products);
            return response()->json([
                'data'=>$data,
                'message'=>'List Data Product',
            ]);
        }catch (\Exception $exception){
            \Log::error('Product list',[$exception]);
            return response()->json([
                'message'=>'Server Error',
            ],400);
        }
    }
}
