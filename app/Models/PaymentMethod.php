<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public function orderPayment()
    {
        return $this->hasMany(OrderPayment::class,'payment_method_id');
    }
}
