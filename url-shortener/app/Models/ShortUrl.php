<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $fillable = ['original_url', 'short_code'];

    public static function generateShortCode(int $id): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $base = strlen($characters);
        $shortCode = '';
        while ($id > 0) {
            $shortCode = $characters[$id % $base] . $shortCode;
            $id = floor($id / $base);
        }
        return $shortCode;
    }
}
