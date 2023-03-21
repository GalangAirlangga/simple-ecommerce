<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            [
                'customer_name' => 'John',
            ],
            [
                'customer_name' => 'Jane',
            ],
            [
                'customer_name' => 'Bob',
            ],
        ]);
    }
}
