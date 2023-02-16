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
Route::middleware(["auth","admin"])->prefix("admin")->group(function (){
    Route::get("/dashboard",[\App\Http\Controllers\HomeController::class,"index"]);
    Route::prefix("product")->group(function (){
        Route::get("/",[\App\Http\Controllers\Admin\ProductController::class,"listAll"]);
        Route::get("/create",[\App\Http\Controllers\Admin\ProductController::class,"create"]);
        Route::post("/create",[\App\Http\Controllers\Admin\ProductController::class,"store"])->name("create_product");
        Route::get("/edit/{product}",[\App\Http\Controllers\Admin\ProductController::class,"edit"]);
        Route::post("/edit/{product}",[\App\Http\Controllers\Admin\ProductController::class,"update"]);
        Route::post("/delete/{product}",[\App\Http\Controllers\Admin\ProductController::class,"delete"]);
    });

    Route::prefix("category")->group(function (){

    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
