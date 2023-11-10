<?php

use App\Models\Categorias;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
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

/* CATEGORIAS - SOLO ADMIN */
//Muestra una tabla con todas las categorías
Route::get('/', [CategoriasController::class, 'index'])->name('home');

//Muestra formulario para crear categoría
Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');

//Carga los datos en la BD
Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');

//Muestra formulario para editar categoría
Route::get('/categorias/{categoria}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');

//Carga los datos editados
Route::put('/categorias/{categoria}', [CategoriasController::class, 'update'])->name('categorias.update');

//Muestra una categoría y sus datos
Route::get('/categorias/{categoria}', [CategoriasController::class, 'show'])->name('categorias.show');
/* FIN CATEGORIAS */