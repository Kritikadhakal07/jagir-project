<?php
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'addUser']);

Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return $request->user();
});

