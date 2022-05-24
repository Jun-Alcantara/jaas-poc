<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JitsiAuthController;

Route::group(['prefix' => 'jitsi'], function () {
    Route::get('/authenticate', [JitsiAuthController::class, 'authenticationForm']);
    Route::post('/authenticate', [JitsiAuthController::class, 'authenticate']);
});
