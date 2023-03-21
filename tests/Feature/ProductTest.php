<?php

test('list product', function () {
    $response = $this->getJson('/api/products');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'price',
                    ]
            ],
            'message'
        ])
        ->assertJsonCount(3, 'data');
});
