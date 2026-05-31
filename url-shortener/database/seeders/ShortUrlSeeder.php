<?php

namespace Database\Seeders;

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
                'short_code' => '00000001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.instagram.com',
                'short_code' => '00000002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.wikipedia.org',
                'short_code' => '00000003',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://www.youtube.com',
                'short_code' => '00000004',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'original_url' => 'https://github.com',
                'short_code' => '00000005',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
