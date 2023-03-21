<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CustomerAddressSeeder extends Seeder
{
    public function run()
    {
        DB::table('customer_addresses')->insert([
            [
                'customer_id' => 1,
                'address' => 'Jl. Peta',
            ],
            [
                'customer_id' => 1,
                'address' => 'Jl. Kopo',
            ],
            [
                'customer_id' => 2,
                'address' => 'Jl. Pahlawan',
            ],
            [
                'customer_id' => 3,
                'address' => 'Jl. Cibaduyut',
            ],
        ]);
    }
}
