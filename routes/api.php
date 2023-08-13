<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CashMovementController;

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


# CRUD
Route::resource('v1/cash/movement', CashMovementController::class)->only('index','store' , 'destroy');
Route::post('v1/cash/movement/update', [ CashMovementController::class, 'update' ] );
Route::post('v1/cash/movement/delete', [ CashMovementController::class, 'destroy']);


# Obtiene la collection de movimientos del mes consultado
Route::post('v1/cash/movement/bymonth', [ CashMovementController::class, 'index' ] )->name('movement.index');
# Obtiene el total de movimientos del mes consultado
Route::post('v1/cash/movement/total', [ CashMovementController::class, 'byMonth' ] );
