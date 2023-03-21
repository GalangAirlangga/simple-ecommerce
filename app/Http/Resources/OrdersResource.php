<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Orders */
class OrdersResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'customer_address_id' => $this->customer_address_id,
            'created_at' => $this->created_at,
            'order_product'=>OrderProductResource::collection($this->orderProducts),
            'order_payment'=>OrderPaymentResource::collection($this->orderPayments)
        ];
    }
}
