<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\OrderController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::post('/customerstore', [CustomerController::class, 'store'])->name('customerstore');
Route::put('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customeredit');
Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('customerupdate');
Route::delete('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customerdelete');

Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan');
Route::post('/kendaraanstore', [KendaraanController::class, 'store'])->name('kendaraanstore');
Route::put('/kendaraan/edit/{id}', [KendaraanController::class, 'edit'])->name('kendaraanedit');
Route::put('/kendaraan/update/{id}', [KendaraanController::class, 'update'])->name('kendaraanupdate');
Route::delete('/kendaraan/delete/{id}', [KendaraanController::class, 'delete'])->name('kendaraandelete');

Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/orderstore', [OrderController::class, 'store'])->name('orderstore');
Route::put('/order/edit/{id}', [OrderController::class, 'edit'])->name('orderedit');
Route::put('/order/update/{id}', [OrderController::class, 'update'])->name('orderupdate');
Route::delete('/order/delete/{id}', [OrderController::class, 'delete'])->name('orderdelete');


