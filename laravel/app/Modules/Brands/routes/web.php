<?php

Route::get('brands/get', 'BrandController@get')             ->name('brands.get');
Route::get('brands/find', 'BrandController@find')           ->name('brands.find');
Route::get('brands/paginate', 'BrandController@paginate')   ->name('brands.paginate');
Route::put('brands/{id}/restore', 'BrandController@restore')->name('brands.restore');
Route::resource('brands', 'BrandController');                     //brands resource