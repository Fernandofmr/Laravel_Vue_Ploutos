<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

Route::post('/ingresar/add', [App\Http\Controllers\IngresosController::class, 'add'])->name('ingresar');
Route::get('/ingresar/update/{id}', [App\Http\Controllers\IngresosController::class, 'update'])->name('update_ingreso');
Route::get('/ingresar/delete/{id}', [App\Http\Controllers\IngresosController::class, 'delete'])->name('delete_ingreso');

Route::post('/gastos/add', [App\Http\Controllers\GastosController::class, 'add'])->name('gastar');
Route::get('/gastos/delete/{id}', [App\Http\Controllers\GastosController::class, 'delete'])->name('delete_gasto');

Route::post('/grupos/add', [App\Http\Controllers\GruposController::class, 'add'])->name('create_group');
Route::get('/grupos/delete/{id}', [App\Http\Controllers\GruposController::class, 'delete'])->name('delete_group');
