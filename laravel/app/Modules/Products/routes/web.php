<?php

Route::get('products/get', 'ProductController@get')             ->name('products.get');
Route::get('products/find', 'ProductController@find')           ->name('products.find');
Route::get('products/paginate', 'ProductController@paginate')   ->name('products.paginate');
Route::put('products/{id}/restore', 'ProductController@restore')->name('products.restore');
Route::resource('products', 'ProductController');                     //products resource