<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/category',[APIController::class,'index']);
Route::get('/product/{id}', [APIController::class, 'index_product']);