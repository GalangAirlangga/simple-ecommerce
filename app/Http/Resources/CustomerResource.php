<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Customer */
class CustomerResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'customer_name' => $this->customer_name,
            'address'=> CustomerAddressResource::collection($this->customerAddresses),
        ];
    }
}
