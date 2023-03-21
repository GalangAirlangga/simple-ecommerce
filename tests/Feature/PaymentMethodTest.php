<?php

test('list payment method', function () {
    $response = $this->getJson('/api/products');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                ]
            ],
            'message'
        ])
        ->assertJsonCount(3, 'data');
});
