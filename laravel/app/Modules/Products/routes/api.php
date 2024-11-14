<?php

use App\Modules\Products\Http\Controllers\ProductController;

Route::get('products/get', [ProductController::class, 'get']);
Route::get('products/find', [ProductController::class, 'find']);
Route::get('products/paginate', [ProductController::class, 'paginate']);
Route::put('products/{id}/restore', [ProductController::class, 'restore']);
Route::resource('products', ProductController::class);