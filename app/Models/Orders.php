<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable=[
        'customer_id',
        'customer_address_id'
    ];
    public function orderPayments()
    {
        return $this->hasMany(OrderPayment::class, 'order_id');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
