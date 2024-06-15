<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ProductController::class,'index']);
Route::post('/add-to-cart/{id}', [ProductController::class, 'addToCart']);
Route::get('/get-cart',[ProductController::class,'getCartItems']);

Route::get('admin/categories',[CategoryController::class,'index'])->name('category.index');
Route::get('admin/add/category',[CategoryController::class,'create'])->name('add.category');
Route::post('admin/create/new/category',[CategoryController::class,'store'])->name('create.category');
Route::get('admin/edit/category/{id}',[CategoryController::class,'edit'])->name('edit.category');
Route::post('admin/update/category',[CategoryController::class,'update'])->name('update.category');
Route::post('admin/delete/category',[CategoryController::class,'destroy'])->name('delete.category');