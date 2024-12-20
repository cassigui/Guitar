<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Modules\Leads\Http\Controllers\LeadController;

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

Route::get('/', [SiteController::class, 'index']);
Route::get('/produtos', [SiteController::class, 'products']);
Route::get('/produto/{slug}/{id}', [SiteController::class, 'product']);
Route::get('/contato', [SiteController::class, 'contact']);
Route::post('/contato', [LeadController::class, 'store']);