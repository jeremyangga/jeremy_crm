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
Route::get('/', [EmployeeController::class, 'myCustomer'])->name('customers.my_customers')->middleware('auth');
Route::get('/lead', [CustomerController::class, 'lead'])->name('customers.lead')->middleware('auth');
Route::get('/services', [ProductController::class, 'index'])->name('products.index')->middleware('auth');
Route::get('/projects', [EmployeeController::class, 'project'])->name('employee.project')->middleware('auth');
Route::get('/approval', [EmployeeController::class, 'approvalPage'])->name('employee.approval_page')->middleware('auth');
Route::post('/approve/{id}', [EmployeeController::class, 'approveCustomer'])->name('employee.approve_customer')->middleware('auth');
Route::get('/subscribe', [EmployeeController::class, 'subscribePage'])->name('employee.subscribe_page')->middleware('auth');
Route::put('/subscribe/{id}', [EmployeeController::class, 'subscribeCustomer'])->name('employee.subscribe_customer')->middleware('auth');
Route::get('/customers-subscribed', [CustomerController::class, 'subscribed'])->name('customers.subscribed')->middleware('auth');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customer.create')->middleware('auth');
Route::post('/customers/create', [CustomerController::class, 'store'])->name('customer.store')->middleware('auth');



