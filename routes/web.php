<?php

use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

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


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'handleLogin'])->name('login');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'handleRegister'])->name('register');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [PageController::class, 'show'])->name('dashboard');

    Route::prefix('/employe')->group(function(){
        Route::get('/', [EmployeController::class, 'index'])->name('employe.index');
        Route::get('/create', [EmployeController::class, 'create'])->name('employe.create');
        Route::get('/edit/{employe}', [EmployeController::class, 'edit'])->name('employe.edit');
    });
});