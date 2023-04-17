<?php

use App\Http\Controllers\Api\DnsInfoController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('dns-info', DnsInfoController::class);
Route::get('get-product-by-name', [ProductController::class, 'get']);
Route::get('products', [ProductController::class, 'index']);
