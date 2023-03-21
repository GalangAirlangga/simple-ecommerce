<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'product_id');
    }
}
