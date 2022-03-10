<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

/* User */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{user}/{grupo}', [App\Http\Controllers\HomeController::class, 'grupos'])->name('grupos.usuario')->middleware('onlyadmin');
Route::get('/users/home', [App\Http\Controllers\UserController::class, 'create'])->name('users.home')->middleware('onlyuser');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show')->middleware('onlyuser');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit')->middleware('onlyuser');
Route::post('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update')->middleware('onlyuser');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

/* Groups */
Route::get('/grupos', [App\Http\Controllers\GrupoController::class, 'index'])->name('grupo.index');
Route::post('/grupos', [App\Http\Controllers\GrupoController::class, 'store'])->name('grupo.store');
Route::get('/grupos/{grupo}', [App\Http\Controllers\GrupoController::class, 'show'])->name('grupo.show')->middleware('onlyuser');
Route::get('/grupos/{grupo}/edit', [App\Http\Controllers\GrupoController::class, 'edit'])->name('grupo.edit')->middleware('onlyuser');
Route::post('/grupos/{grupo}', [App\Http\Controllers\GrupoController::class, 'update'])->name('grupo.update');
Route::delete('/grupos/{grupo}', [App\Http\Controllers\GrupoController::class, 'destroy'])->name('grupo.delete');

/* Alumnos */
Route::get('/alumnos', [App\Http\Controllers\AlumnoController::class, 'index'])->name('alumno.index')->middleware('onlyuser');
Route::post('/alumnos', [App\Http\Controllers\AlumnoController::class, 'store'])->name('alumno.store');
Route::get('/alumnos/{alumno}', [App\Http\Controllers\AlumnoController::class, 'show'])->name('alumno.show')->middleware('onlyuser');
Route::get('/alumnos/{alumno}/edit', [App\Http\Controllers\AlumnoController::class, 'edit'])->name('alumno.edit')->middleware('onlyuser');
Route::post('/alumnos/{alumno}', [App\Http\Controllers\AlumnoController::class, 'update'])->name('alumno.update');
Route::delete('/alumnos/{alumno}', [App\Http\Controllers\AlumnoController::class, 'destroy'])->name('alumno.delete');


Route::any('/register', function () {
    return  view('auth.login');
});
