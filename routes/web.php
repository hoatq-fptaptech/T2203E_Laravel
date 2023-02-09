<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[App\Http\Controllers\WebController::class,"home"] );
Route::get('about-us',[App\Http\Controllers\WebController::class,"aboutUs"]);

// category
Route::get("/admin/product",[\App\Http\Controllers\Admin\ProductController::class,"listAll"]);
Route::get("/admin/product/create",[\App\Http\Controllers\Admin\ProductController::class,"create"]);
Route::post("/admin/product/create",[\App\Http\Controllers\Admin\ProductController::class,"store"])->name("create_product");
Route::get("/admin/product/edit/{product}",[\App\Http\Controllers\Admin\ProductController::class,"edit"]);
Route::post("/admin/product/edit/{product}",[\App\Http\Controllers\Admin\ProductController::class,"update"]);
