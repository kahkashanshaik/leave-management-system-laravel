<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeMangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\UserController;
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
  return HomeController::dashboard();
});

// Show login form
Route::get('/users/login', [UserController::class, 'login'])->name('login');

// login user

Route::post('/users/authenticate', [UserController::class, 'authenticate'] )->name('authenticate');

// Show registration form
Route::get('/users/register', [UserController::class, 'create'])->name('register')->middleware('auth');

// create employee form
Route::post('/users/addEmployee', [UserController::class, 'store'])->name('addEmployee');

// user logout
Route::post('/logout', [UserController::class, 'logout']);

// show leave settings forms
Route::get('/admin/settings', [AdminController::class, 'create'])->middleware('auth');

// create new leave settings
Route::post('/admin/newsettings', [AdminController::class, 'store']);

// show emp leave management
Route::resource('leave', LeaveController::class);

// show emp management
Route::resource('mangemps', EmployeeMangController::class);
