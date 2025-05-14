<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/bad-version', function (Request $request) {
    if ($request->get('key') != config('api.key')) {
        abort(code: 401);
    }

    // 設定範圍
    $min = 1;
    $max = 2 ** 20;
    // 使用固定 hash 產生 pseudo-random number
    mt_srand(crc32(date('Y-m-d'))); // 設定種子
    $number = mt_rand($min, $max); // 產生一個固定但每日不同的數字
    mt_srand(); // 重設 seed
    return [
        'bad-version' => $number
    ];
});

Route::get('/is-bad-version', function (Request $request) {
    // 設定範圍
    $min = 1;
    $max = 2 ** 20;
    // 使用固定 hash 產生 pseudo-random number
    mt_srand(crc32(date('Y-m-d'))); // 設定種子
    $number = mt_rand($min, $max);
    mt_srand(); // 重設 seed
    return [
        'bad-version' => $request->get('version') >= $number
    ];
});
