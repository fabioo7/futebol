<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Products

Route::GET('produtos', [apiController::class, 'products']);
Route::GET('checkProdutos/{id}',  [apiController::class, 'checkProducts']);
Route::POST('insertProdutos', [apiController::class, 'insertProducts']);
Route::POST('atualizarProdutos', [apiController::class, 'updateProducts']);
Route::DELETE('produtos', [apiController::class, 'delproducts']);


Route::GET('checkBrands/{id}',  [apiController::class, 'checkBrands']);

Route::get('marcas', [apiController::class,  'Brands']);
Route::post('marcas', [apiController::class,  'insetBrands']);


