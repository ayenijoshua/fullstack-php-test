<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HmoController;
use App\Http\Controllers\ProviderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/

Route::get('/', [OrderController::class, 'createOrder']);

Route::get('create-order', [OrderController::class, 'createOrder']);

Route::get('hmos/{id}/batch-orders', [HmoController::class, 'batchOrderPage']);

Route::get('create-hmo', [HmoController::class, 'createHmo']);

Route::get('create-provider', [ProviderController::class, 'createProvider']);

