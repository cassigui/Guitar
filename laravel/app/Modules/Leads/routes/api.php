<?php

use App\Modules\Leads\Http\Controllers\LeadController;

Route::get('leads/get', [LeadController::class, 'get']);
Route::get('leads/find', [LeadController::class, 'find']);
Route::get('leads/paginate', [LeadController::class, 'paginate']);
Route::put('leads/{id}/restore', [LeadController::class, 'restore']);
Route::resource('leads', LeadController::class);
