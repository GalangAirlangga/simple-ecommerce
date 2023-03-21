<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product A',
                'price' => 100000,
            ],
            [
                'name' => 'Product B',
                'price' => 150000,
            ],
            [
                'name' => 'Product C',
                'price' => 200000,
            ],
        ]);
    }
}
