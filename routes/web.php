<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('product.main');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::delete('/product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/sale', [SaleController::class, 'index'])->name('sale');
Route::get('/sale/detail', [SaleController::class, 'detail'])->name('sale.detail');
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.main');
Route::get('/employee/{user}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::delete('/employee/{user}/delete', [EmployeeController::class, 'delete'])->name('employee.delete');


