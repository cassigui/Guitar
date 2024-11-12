<?php

use App\Modules\Brands\Http\Controllers\BrandController;

Route::get('brands/get', [BrandController::class, 'get']);
Route::get('brands/find', [BrandController::class, 'find']);
Route::get('brands/paginate', [BrandController::class, 'paginate']);
Route::put('brands/{id}/restore', [BrandController::class, 'restore']);
Route::resource('brands', BrandController::class);