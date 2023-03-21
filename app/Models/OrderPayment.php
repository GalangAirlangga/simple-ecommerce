<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    protected $fillable=[
        'order_id',
        'payment_method_id'
    ];
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
