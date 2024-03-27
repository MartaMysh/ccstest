<?php

use App\Http\Controllers\Api\BoardGamesController;
use App\Http\Controllers\Api\SalesController;
use App\Models\BoardGames;
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

Route::get('/', [BoardGamesController::class, 'index']);

Route::apiResource('boardGames', BoardGamesController::class);

Route::apiResource('sales', SalesController::class);
