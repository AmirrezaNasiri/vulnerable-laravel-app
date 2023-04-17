<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    $products = Product::where('name', 'like', '%'.request('name').'%');

    return view('products ', [
        'products' => $products->limit(10)->get()
    ]);
});

Route::get('/read-some-jock', function () {
    return view('csrf');
});
