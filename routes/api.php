<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaveController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Saves
Route::get('/save/{userId?}', [SaveController::class, 'index']);
Route::post('/save', [SaveController::class, 'store']);
Route::delete('/save/{id}', [SaveController::class, 'destroy']);