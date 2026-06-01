<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;

Route::post('short-urls', [ShortUrlController::class, 'store']);