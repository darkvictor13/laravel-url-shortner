<?php

use App\Http\Controllers\ShortUrlController;
use Illuminate\Support\Facades\Route;

Route::get('short-urls/{shortCode}', [ShortUrlController::class, 'show'])
    ->middleware('throttle:short-urls:show');
