<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function customerAddresses()
    {
        return $this->hasMany(CustomerAddress::class, 'customer_id');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'customer_id');
    }
}
