<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employee/home', [App\Http\Controllers\HomeController::class, 'employeehome'])->name('employee.home');

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminhome'])->name('admin.home');
Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'admindashboard'])->name('admin.dashboard');

Route::get('/admin/adduser', [App\Http\Controllers\HomeController::class, 'adminadduser'])->name('admin.adduser');
Route::post('/admin/storuser', [App\Http\Controllers\HomeController::class, 'adminstoruser'])->name('admin.storuser');

Route::get('/admin/edituser/{id}', [App\Http\Controllers\HomeController::class, 'adminedituser'])->name('admin.edituser');
Route::put('/admin/updateuser/{id}', [App\Http\Controllers\HomeController::class, 'adminupdateuser'])->name('admin.updateuser');

Route::delete('/admin/deleteuser/{id}', [App\Http\Controllers\HomeController::class, 'admindeleteuser'])->name('admin.deleteuser');