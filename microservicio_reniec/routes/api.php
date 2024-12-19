<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReniecController;

Route::post('/reniec/dni', [ReniecController::class, 'consultarDni']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
