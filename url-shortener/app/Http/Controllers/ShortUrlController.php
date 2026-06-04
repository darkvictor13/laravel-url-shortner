<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortUrlRequest;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\DB;

class ShortUrlController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortUrlRequest $request)
    {
        $validated = $request->validated();
        $originalUrl = $validated['url'];

        $shortUrl = DB::transaction(function () use ($originalUrl) {
            $shortUrl = ShortUrl::create([
                'original_url' => $originalUrl,
            ]);

            $shortUrl->update([
                'short_code' => ShortUrl::generateShortCode($shortUrl->id),
            ]);

            return $shortUrl;
        });

        return response()->json($shortUrl, 201);
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
