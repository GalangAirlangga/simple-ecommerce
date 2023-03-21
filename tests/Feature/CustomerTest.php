<?php

test('list customer', function () {
    $response = $this->getJson('/api/customers');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'customer_name',
                    'address' => [
                        '*' => [
                            'id',
                            'customer_id',
                            'address'
                        ]
                    ]
                ]
            ],
            'message'
        ])
        ->assertJsonCount(3, 'data');
});
