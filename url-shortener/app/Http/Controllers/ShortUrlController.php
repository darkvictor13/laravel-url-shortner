<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShortUrlController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url|unique:short_urls,original_url',
            'Content-Type' => 'application/json',
        ]);

        return DB::transaction(function () use ($request) {
            $nextId = DB::table('short_urls')->max('id') + 1;

            $originalUrl = $request->input('url');
            $shortCode = ShortUrl::generateShortCode($nextId);

            $shortUrl = ShortUrl::create([
                'original_url' => $originalUrl,
                'short_code' => $shortCode,
            ]);
            return response()->json($shortUrl, 201);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $shortCode)
    {
        $shortUrl = ShortUrl::where('short_code', $shortCode)->firstOrFail();
        return response()->json($shortUrl->makeHidden('id'));
    }
}
