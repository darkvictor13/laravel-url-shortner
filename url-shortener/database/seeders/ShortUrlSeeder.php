<?php

namespace Database\Seeders;

use App\Models\ShortUrl;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShortUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('short_urls')->insert([
            [
                'original_url' => 'https://www.google.com',
                'short_code' => ShortUrl::generateShortCode(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.instagram.com',
                'short_code' => ShortUrl::generateShortCode(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.wikipedia.org',
                'short_code' => ShortUrl::generateShortCode(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.youtube.com',
                'short_code' => ShortUrl::generateShortCode(4),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://github.com',
                'short_code' => ShortUrl::generateShortCode(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.facebook.com',
                'short_code' => ShortUrl::generateShortCode(6),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.twitter.com',
                'short_code' => ShortUrl::generateShortCode(7),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.linkedin.com',
                'short_code' => ShortUrl::generateShortCode(8),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.reddit.com',
                'short_code' => ShortUrl::generateShortCode(9),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.netflix.com',
                'short_code' => ShortUrl::generateShortCode(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
