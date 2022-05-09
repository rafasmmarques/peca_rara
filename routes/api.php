<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| A autenticação via Sanctum está funcionando, porém
| não houve tempo para fazer sua integração no front-end.
| Por isso deixei todas as rotas públicas.
|
*/

//--------------------------------------------Protected routes
Route::group(['middleware' => 'auth:sanctum'], function () {
});

Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/clients', [ClientController::class, 'store']);
Route::put('/clients/{id}', [ClientController::class, 'update']);
Route::delete('/clients/{id}', [ClientController::class, 'destroy']);

Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::post('/orders', [OrderController::class, 'store']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
Route::post('/register', [AuthController::class, 'register']);

//--------------------------------------------Public routes
Route::post('/login', [AuthController::class, 'login']);

Route::get('/clients', [ClientController::class, 'index']);
Route::get('/client/{id}', [ClientController::class, 'show']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{query}', [ProductController::class, 'search']);

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
