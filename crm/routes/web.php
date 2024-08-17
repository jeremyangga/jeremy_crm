<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
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

Route::get('/login', [EmployeeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [EmployeeController::class, 'login'])->name('employee.login');
Route::post('/logout', [EmployeeController::class, 'logout'])->name('employee.logout');

// Route::get('/', function () {
//     return view('welcome');
// }) ->middleware('auth');
Route::get('/', [CustomerController::class, 'lead'])->name('customers.lead')->middleware('auth');
Route::get('/services', [ProductController::class, 'index'])->name('products.index')->middleware('auth');
Route::get('/customers-subscribed', [CustomerController::class, 'subscribed'])->name('customers.subscribed')->middleware('auth');



