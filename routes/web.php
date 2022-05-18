<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/register', function () {
    return view('/auth/register');
})->name('register');

Route::get('/dashboard', function () {
    return view('/Products/dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/boutique', '\App\Http\Controllers\ProductController@index')->name('products.index');
Route::get('/boutique/{slug}', '\App\Http\Controllers\ProductController@show')->name('products.show');

Route::post('/panier/ajouter', '\App\Http\Controllers\CartController@store')->name('cart.store');
Route::get('/panier', '\App\Http\Controllers\CartController@index')->name('cart.index');
Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');
