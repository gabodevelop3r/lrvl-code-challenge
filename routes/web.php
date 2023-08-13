<?php

use Illuminate\Support\Facades\Route;

# controllers
use App\Http\Controllers\CashMovementController;


# HOME
Route::get('/', function () {
    return to_route('home');
});

# HOME
Route::get('/home/{date?}', [CashMovementController::class, 'index'])->name('home');

# Formulario de transacciones
Route::get('/transactions', [CashMovementController::class, 'transactions'])->name('transactions');

# consultar gastos del mes seleccionado
Route::post('/movement/month', [CashMovementController::class, 'byMonth'])->name('byMonth');

# CRUD de transacciones
Route::resource('cash/movement', CashMovementController::class)->except('show', 'index', 'create');




