<?php
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
