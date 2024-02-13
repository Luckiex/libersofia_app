<?php

use App\Http\Controllers\AutoreController;
use App\Http\Controllers\EditorialeController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [LibroController::class, 'index']);

//Libros
Route::get('libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('libros/crear', [LibroController::class, 'create'])->name('libros.crear');
Route::get('libros/{id}', [LibroController::class, 'show'])->name('libros.mostrar');
Route::get('libros/{libro}/editar', [LibroController::class, 'edit'])->name('libros.editar');

Route::post('libros', [LibroController::class, 'guardar'])->name('libros.guardar');

Route::put('libros/{libro}', [LibroController::class, 'update'])->name('libros.actualizar');

Route::delete('libros/{libro}', [LibroController::class, 'destroy'])->name('libros.borrar');


//Autores
Route::get('autores', [AutoreController::class, 'index'])->name('autores.index');
Route::get('autores/crear', [AutoreController::class, 'create'])->name('autores.crear');
Route::get('autores/{id}', [AutoreController::class, 'show'])->name('autores.mostrar');
Route::get('autores/{autor}/editar', [AutoreController::class, 'edit'])->name('autores.editar');

Route::post('autores', [AutoreController::class, 'guardar'])->name('autores.guardar');
Route::put('autores/{autor}', [AutoreController::class, 'update'])->name('autores.actualizar');

Route::delete('autores/{autor}', [AutoreController::class, 'destroy'])->name('autores.borrar');


//Editoriales
Route::get('editoriales', [EditorialeController::class, 'index'])->name('editoriales.index');
Route::get('editoriales/crear', [EditorialeController::class, 'create'])->name('editoriales.crear');
Route::get('editoriales/{id}', [EditorialeController::class, 'show'])->name('editoriales.mostrar');
Route::get('editoriales/{editorial}/editar', [EditorialeController::class, 'edit'])->name('editoriales.editar');

Route::post('editoriales', [EditorialeController::class, 'guardar'])->name('editoriales.guardar');
Route::put('editoriales/{editorial}', [EditorialeController::class, 'update'])->name('editoriales.actualizar');

Route::delete('editoriales/{editorial}', [EditorialeController::class, 'destroy'])->name('editoriales.borrar');