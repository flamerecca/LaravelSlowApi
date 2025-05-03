<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

Route::get('/user-check', function (Request $request) {
    try {
        $validated = $request->validate([
            'user' => 'bail|required|string',
        ]);
    } catch (ValidationException $exception) {
        return response()->json(
            [
                'error' => 'Invalid input. "user" must be string.'
            ],
            status: Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
    sleep(5);
    return [
        'user' => $validated['user'],
        'response' => 'user information has been verified',
    ];
});

Route::get('/exchange-rate', function (Request $request) {
    try {
        $validated = $request->validate([
            'usd' => 'bail|required|integer',
        ]);
    } catch (ValidationException $exception) {
        return response()->json(
            [
                'error' => 'Invalid input. "usd" must be integer.'
            ],
            status: Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
    sleep(5);
    return [
        'usd' => (int)$validated['usd'],
        'twd' => (int)$validated['usd'] * 30,
    ];
});

Route::get('/date-check', function (Request $request) {
    try {
        $validated = $request->validate([
            'date' => 'bail|required|string',
        ]);
    } catch (ValidationException $exception) {
        return response()->json(
            [
                'error' => 'Invalid input. "date" must be string.'
            ],
            status: Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
    sleep(5);
    return [
        'date' => $validated['date'],
        'isChecked' => true,
    ];
});
