<?php

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\PaymentMethod;
use App\Models\Product;

it('can create a new order', function () {
    $customer = Customer::inRandomOrder(1)->first();
    $customerAddress = CustomerAddress::whereCustomerId($customer->id)->inRandomOrder(1)->first();
    $product1 = Product::inRandomOrder(1)->first();
    $product2 = Product::inRandomOrder(1)->first();
    $payment1 = PaymentMethod::inRandomOrder(1)->first();
    $payment2 = PaymentMethod::inRandomOrder(1)->first();

    $response = $this->postJson('/api/orders', [
        'customer_id' => $customer->id,
        'customer_address_id' => $customerAddress->id,
        'products' => [
            ['product_id' => $product1->id],
            ['product_id' => $product2->id],
        ],
        'payment_methods' => [
            ['payment_method_id' => $payment1->id],
            ['payment_method_id' => $payment2->id],
        ],
    ]);

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Order successfully created',
        ]);
});

it('returns a list of orders', function () {
    $customer = Customer::inRandomOrder(1)->first();
    $customerAddress = CustomerAddress::whereCustomerId($customer->id)->inRandomOrder(1)->first();
    $product1 = Product::inRandomOrder(1)->first();
    $product2 = Product::inRandomOrder(1)->first();
    $payment1 = PaymentMethod::inRandomOrder(1)->first();
    $payment2 = PaymentMethod::inRandomOrder(1)->first();

    $this->postJson('/api/orders', [
        'customer_id' => $customer->id,
        'customer_address_id' => $customerAddress->id,
        'products' => [
            ['product_id' => $product1->id],
            ['product_id' => $product2->id],
        ],
        'payment_methods' => [
            ['payment_method_id' => $payment1->id],
            ['payment_method_id' => $payment2->id],
        ],
    ]);
    $response = $this->get('/api/orders');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'customer_id',
                    'created_at',
                    'order_product'=>[
                        '*'=>[
                            'id',
                            'order_id',
                            'product_id'
                        ]
                    ],
                    'order_payment'=>[
                        '*'=>[
                            'id',
                            'order_id',
                            'payment_method_id'
                        ]
                    ]
                ]
            ],
            'message',
        ]);
});
