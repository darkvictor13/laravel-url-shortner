<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;

uses(RefreshDatabase::class);

beforeEach(function () {
    RateLimiter::clear(md5('short-urls:create127.0.0.1'));
    RateLimiter::clear(md5('short-urls:show127.0.0.1'));
});

test('get my short url', function () {
    $createResponse = $this->postJson('/api/short-urls', ['url' => 'https://www.example.com']);
    $createResponse->assertStatus(201);

    $getResponse = $this->get('/short-urls/'.$createResponse->json('short_code'));
    $getResponse->assertStatus(200);
    $getResponse->assertJson([
        'original_url' => 'https://www.example.com',
        'short_code' => $createResponse->json('short_code'),
    ]);
});

test('rate limits short url creation', function () {
    foreach (range(1, 10) as $index) {
        $this->postJson('/api/short-urls', [
            'url' => "https://www.example{$index}.com",
        ])->assertStatus(201);
    }

    $this->postJson('/api/short-urls', [
        'url' => 'https://www.blocked-example.com',
    ])->assertStatus(429);
});

test('rate limits short url lookups', function () {
    $createResponse = $this->postJson('/api/short-urls', ['url' => 'https://www.example.com']);
    $createResponse->assertStatus(201);

    $url = '/short-urls/'.$createResponse->json('short_code');

    foreach (range(1, 60) as $index) {
        $this->get($url)->assertStatus(200);
    }

    $this->get($url)->assertStatus(429);
});
