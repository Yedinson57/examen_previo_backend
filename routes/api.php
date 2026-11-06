<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\AlumnoController;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('profesores', [ProfesorController::class,'index'])->name('api.v1.profesores.index');
Route::post('profesores', [ProfesorController::class,'store'])->name('api.v1.profesores.store');
Route::get('profesores/{profesor}', [ProfesorController::class,'show'])->name('api.v1.profesores.show');
Route::put('profesores/{profesor}',[ProfesorController::class,'update'])->name('api.v1.profesor.update');
Route::delete('profesores/{profesor}',[ProfesorController::class,'destroy'])->name('api.v1.profesor.destroy');

Route::get('modulos', [ModuloController::class,'index'])->name('api.v1.modulos.index');
Route::post('modulos', [ModuloController::class,'store'])->name('api.v1.modulos.store');
Route::get('modulos/{modulo}', [ModuloController::class,'show'])->name('api.v1.modulos.show');
Route::put('modulos/{modulo}',[ModuloController::class,'update'])->name('api.v1.modulo.update');
Route::delete('modulos/{modulo}',[ModuloController::class,'destroy'])->name('api.v1.modulo.destroy');

Route::get('alumnos', [AlumnoController::class,'index'])->name('api.v1.alumnos.index');
Route::post('alumnos', [AlumnoController::class,'store'])->name('api.v1.alumnos.store');
Route::get('alumnos/{alumno}', [AlumnoController::class,'show'])->name('api.v1.alumnos.show');
Route::put('alumnos/{alumno}',[AlumnoController::class,'update'])->name('api.v1.alumno.update');
Route::delete('alumnos/{alumno}',[AlumnoController::class,'destroy'])->name('api.v1.alumno.destroy');

