<?php

use App\Models\ShortUrl;

it('generates predictable short codes for known ids', function (int $id, string $expectedCode) {
    expect(ShortUrl::generateShortCode($id))->toBe($expectedCode);
})->with([
    'zero id' => [0, '00000000'],
    'single digit id' => [1, '00000001'],
    'max one-char base value' => [61, '0000000Z'],
    'base rollover' => [62, '00000010'],
    'square of base' => [3844, '00000100'],
]);

it('always returns an 8 character code', function () {
    $code = ShortUrl::generateShortCode(999999);

    expect($code)->toHaveLength(8);
});
