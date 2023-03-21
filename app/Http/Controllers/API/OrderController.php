<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrdersResource;
use App\Http\Resources\PaymentMethodResource;
use App\Models\OrderPayment;
use App\Models\OrderProduct;
use App\Models\Orders;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        try {
            //show data order
            $orders = Orders::with('orderPayments','orderProducts')->get();
            $data = OrdersResource::collection($orders);
            return response()->json([
                'data'=>$data,
                'message'=>'List Data Orders',
            ]);
        }catch (\Exception $exception){
            \Log::error('Orders list',[$exception]);
            return response()->json([
                'message'=>'Server Error',
            ],400);
        }
    }

    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'customer_address_id' => 'required|exists:customer_addresses,id',
            'products.*.product_id' => 'required|exists:products,id',
            'payment_methods.*.payment_method_id' => 'required|exists:payment_methods,id',
        ]);
        \DB::beginTransaction();
        try {
            // Create new order
            $order = Orders::create([
                'customer_id' => $validatedData['customer_id'],
                'customer_address_id' => $validatedData['customer_address_id']
            ]);

            // Create order products
            collect($validatedData['products'])->each(fn($product) => OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['product_id']
            ]));

            // Create order payments
            collect($validatedData['payment_methods'])->each(fn($payment) => OrderPayment::create([
                'order_id' => $order->id,
                'payment_method_id' => $payment['payment_method_id']
            ]));
            \DB::commit();
            return response()->json([
                'message'=>'Order successfully created',
            ]);
        }catch (\Exception $exception){
            \DB::rollBack();
            \Log::error('Orders list',[$exception]);
            return response()->json([
                'message'=>'Server Error',
            ],400);
        }

    }
}
