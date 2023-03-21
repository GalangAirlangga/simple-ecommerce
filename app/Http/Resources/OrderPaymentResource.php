<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\OrderPayment */
class OrderPaymentResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'payment_method_id' => $this->payment_method_id,
        ];
    }
}
