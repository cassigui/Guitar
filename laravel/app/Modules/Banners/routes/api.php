<?php

use App\Modules\Banners\Http\Controllers\BannerController;

Route::get('banners/get', [BannerController::class, 'get']);
Route::get('banners/find', [BannerController::class, 'find']);
Route::get('banners/paginate', [BannerController::class, 'paginate']);
Route::put('banners/{id}/restore', [BannerController::class, 'restore']);
Route::resource('banners', BannerController::class);