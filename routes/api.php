<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::get('/produk', 'ProdukController@index');  <--- Tabel kosong Looping banyak, gara2 produk harusnya produks
Route::get('/produks', 'ProdukController@index');
Route::post('/produk/store', 'ProdukController@store');
Route::get('/produk/edit/{id}', 'ProdukController@getProduk');
Route::get('/produk/show/{id}', 'ProdukController@getProduk');
Route::put('/produk/update/{id}', 'ProdukController@update');
Route::delete('/produk/delete/{id}', 'ProdukController@delete'); 
