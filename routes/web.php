<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ContrasenasController;
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

/* LANDING PAGE */

Route::get('/', function(){
    return view('index', 
    [
        'heading' => 'KeyLock'
    ]);
})->name('index');

Route::get('/404', function(){
    return view('working', 
    [
        'heading' => 'KeyLock'
    ]);
})->name('404');


/* FIN LANDING PAGE */


/* USUARIOS */

// Formulario para registrar usuarios
Route::get('/registro', [UsuariosController::class, 'create'])
->name('usuarios.create')
->middleware('guest');

// Cargar los datos a la BD, nuevo usuario.
Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');

// Cerrar sesion del usuario
Route::post('/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');

// Formulario de inicio de sesion
Route::get('/login', [UsuariosController::class, 'login'])
->name('usuarios.login')
->middleware('guest');

// Loguea al usuario
Route::post('usuarios/authenticate', [UsuariosController::class, 'authenticate'])->name('usuarios.authenticate');

/* FIN USUARIOS */

/* GRUPOS */

//Muestra una tabla con todos los grupos del usuario
Route::get('/grupos/index', [GruposController::class, 'index'])
->name('grupos.index')
->middleware('auth');

//Muestra formulario para crear un grupo
Route::get('/grupos/create', [GruposController::class, 'create'])
->name('grupos.create')
->middleware('auth');

//Carga los datos en la BD
Route::post('/grupos', [GruposController::class, 'store'])
->name('grupos.store')
->middleware('auth');

//Muestra formulario para editar un grupo
Route::get('/grupos/{grupo}/edit', [GruposController::class, 'edit']
)->name('grupos.edit')
->middleware('auth');

//Carga los datos editados
Route::put('/grupos/{grupo}', [GruposController::class, 'update'])
->name('grupos.update')
->middleware('auth');

//Carga los datos editados
Route::delete('/grupos/{grupo}', [GruposController::class, 'destroy'])
->name('grupos.delete')
->middleware('auth');

//Muestra una grupo y sus datos
Route::get('/grupos/{grupo}', [GruposController::class, 'show'])
->name('grupos.show')
->middleware('auth');

/* FIN GRUPOS */

/* CONTRASEÑAS */

//Muestra formulario para crear categoría
Route::get('/contrasenas/create', [ContrasenasController::class, 'create'])
->name('contrasenas.create')
->middleware('auth');

//Carga los datos en la BD
Route::post('/contrasenas', [ContrasenasController::class, 'store'])
->name('contrasenas.store')
->middleware('auth');

//Muestra formulario para editar categoría
Route::get('/contrasenas/{contrasena}/edit', [ContrasenasController::class, 'edit']
)->name('contrasenas.edit')
->middleware('auth');

//Carga los datos editados
Route::put('/contrasenas/{contrasena}', [ContrasenasController::class, 'update'])
->name('contrasenas.update')
->middleware('auth');

//Carga los datos editados
Route::delete('/contrasenas/{contrasena}', [ContrasenasController::class, 'destroy'])
->name('contrasenas.delete')
->middleware('auth');


/* FIN CONTRASEÑAS */


/* CATEGORIAS - SOLO ADMIN */

//Muestra una tabla con todas las categorías
Route::get('/categorias/index', [CategoriasController::class, 'index'])
->name('categorias.index');

// //Muestra formulario para crear categoría
// Route::get('/categorias/create', [CategoriasController::class, 'create'])
// ->name('categorias.create')
// ->middleware('auth');

// //Carga los datos en la BD
// Route::post('/categorias', [CategoriasController::class, 'store'])
// ->name('categorias.store')
// ->middleware('auth');

// //Muestra formulario para editar categoría
// Route::get('/categorias/{categoria}/edit', [CategoriasController::class, 'edit']
// )->name('categorias.edit')
// ->middleware('auth');

// //Carga los datos editados
// Route::put('/categorias/{categoria}', [CategoriasController::class, 'update'])
// ->name('categorias.update')
// ->middleware('auth');

//Muestra una categoría y sus datos
Route::get('/categorias/{categoria}', [CategoriasController::class, 'show'])->name('categorias.show');

/* FIN CATEGORIAS */