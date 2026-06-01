<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
test('get my short url', function () {
    $createResponse = $this->postJson('/api/short-urls', ['url' => 'https://www.example.com']);
    $createResponse->assertStatus(201);

    $getResponse = $this->get('/short-urls/' . $createResponse->json('short_code'));
    $getResponse->assertStatus(200);
    $getResponse->assertJson([
        'original_url' => 'https://www.example.com',
        'short_code' => $createResponse->json('short_code'),
    ]);
});
