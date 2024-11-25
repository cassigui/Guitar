<?php

Route::get('leads/get', 'LeadController@get')             ->name('leads.get');
Route::get('leads/find', 'LeadController@find')           ->name('leads.find');
Route::get('leads/paginate', 'LeadController@paginate')   ->name('leads.paginate');
Route::put('leads/{id}/restore', 'LeadController@restore')->name('leads.restore');
Route::resource('leads', 'LeadController');