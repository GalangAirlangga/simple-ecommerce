<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //call seeder customer,address,payment method, and product

        $this->call([
            CustomerSeeder::class,
            CustomerAddressSeeder::class,
            ProductSeeder::class,
            PaymentMethodSeeder::class,
        ]);
    }
}
