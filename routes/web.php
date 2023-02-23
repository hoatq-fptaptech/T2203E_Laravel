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
    include_once("admin.php");
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/detail/{product}",[\App\Http\Controllers\WebController::class,"detail"])->name("product_detail");
Route::post("/add-to-cart/{product}",[\App\Http\Controllers\WebController::class,"addToCart"])->name("add_to_cart");
Route::get("/cart",[\App\Http\Controllers\WebController::class,"cart"]);
Route::get("/checkout",[\App\Http\Controllers\WebController::class,"checkout"]);
Route::get("/remove-cart/{product}",[\App\Http\Controllers\WebController::class,"remove"]);
Route::post("/checkout",[\App\Http\Controllers\WebController::class,"placeOrder"]);
Route::get("/sendNotification",[\App\Http\Controllers\WebController::class,"sendNotification"]);
