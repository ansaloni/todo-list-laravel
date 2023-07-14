<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaController;


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


// Rota para exibir a página inicial com as listas
Route::get('/', [ListaController::class, 'index'])->name('listas.index');

// Rota para criar uma nova lista
Route::post('/listas', [ListaController::class, 'store'])->name('listas.store');

// Rota para exibir uma lista específica
Route::get('/listas/{lista}', [ListaController::class, 'show'])->name('listas.show');

// Rota para atualizar uma lista
Route::put('/listas/{lista}', [ListaController::class, 'update'])->name('listas.update');

// Rota para excluir uma lista
Route::delete('/listas/{lista}', [ListaController::class, 'destroy'])->name('listas.destroy');