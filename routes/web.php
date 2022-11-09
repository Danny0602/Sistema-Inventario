<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
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

Route::get('/productos',[ProductoController::class,'index'] )->middleware(['auth'])->name('productos.index');
Route::get('/productos/create',[ProductoController::class,'create'] )->middleware(['auth'])->name('productos.create');
Route::get('/productos/{producto:nombre}/edit',[ProductoController::class,'edit'] )->middleware(['auth'])->name('productos.edit');


Route::get('/proveedores',[ProveedorController::class,'index'] )->middleware(['auth'])->name('proveedores.index');
Route::get('/proveedores/create',[ProveedorController::class,'create'] )->middleware(['auth'])->name('proveedores.create');
Route::get('/proveedores/{proveedor:nombre_empresa}/edit',[ProveedorController::class,'edit'] )->middleware(['auth'])->name('proveedores.edit');

require __DIR__.'/auth.php';
