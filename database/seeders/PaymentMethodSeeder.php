<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'name' => 'Credit Card',
                'is_active' => true,
            ],
            [
                'name' => 'Debit Card',
                'is_active' => true,
            ],
            [
                'name' => 'Bank Transfer',
                'is_active' => false,
            ],
        ]);
    }
}
