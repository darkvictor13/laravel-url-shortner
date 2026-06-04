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

        return DB::transaction(function () use ($validated) {
            $nextId = DB::table('short_urls')->max('id') + 1;

            $originalUrl = $validated['url'];
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
