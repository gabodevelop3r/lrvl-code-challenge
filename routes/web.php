<?php

use Illuminate\Support\Facades\Route;

# controllers
use App\Http\Controllers\CashMovementController;

# Models
use App\Models\User;
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

Route::get('/home/{date?}', [CashMovementController::class, 'index'])->name('home');
Route::get('/transactions', [CashMovementController::class, 'transactions'])->name('transactions');
Route::post('/movement/month', [CashMovementController::class, 'byMonth'])->name('byMonth');

Route::resource('cash/movement', CashMovementController::class)->only('store','destroy','edit');




