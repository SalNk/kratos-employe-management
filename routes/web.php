<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\SalaireController;


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


Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'handleLogin'])->name('login');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'handleRegister'])->name('register');

Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->group(function () {

        Route::get('/dashboard', [PageController::class, 'show'])->name('dashboard');

        Route::prefix('/department')->group(function () {
            Route::get('/', [DepartementController::class, 'index'])->name('departement.index');
            Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
            Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');
            Route::get('/edit/{id}', [DepartementController::class, 'edit'])->name('departement.edit');
            Route::get('/update/{department}', [DepartementController::class, 'update'])->name('departement.update');
            Route::get('/delete/{id}', [DepartementController::class, 'delete'])->name('departement.delete');
            Route::post('/department/search/', [DepartementController::class, 'search'])->name('departement.search');
        });

        Route::prefix('/employe')->group(function () {
            Route::get('/', [EmployeController::class, 'index'])->name('employe.index');
            Route::post('/create', [EmployeController::class, 'store'])->name('employe.store');
            Route::get('/create', [EmployeController::class, 'create'])->name('employe.create');
            Route::get('/edit/{employe}', [EmployeController::class, 'edit'])->name('employe.edit');
            Route::get('/delete/{employe}', [EmployeController::class, 'delete'])->name('employe.delete');
            Route::get('/update/{employe}', [EmployeController::class, 'update'])->name('employe.update');
            Route::post('/employe/search/', [EmployeController::class, 'search'])->name('employe.search');
        });

        Route::prefix('/rendez-vous')->group(function () {
            Route::get('/', [RendezVousController::class, 'index'])->name('rdv.index');
            Route::post('/create', [RendezVousController::class, 'store'])->name('rdv.store');
            Route::get('/create', [RendezVousController::class, 'create'])->name('rdv.create');
            Route::get('/edit/{rdv}', [RendezVousController::class, 'edit'])->name('rdv.edit');
            Route::get('/delete/{rdv}', [RendezVousController::class, 'delete'])->name('rdv.delete');
            Route::get('/update/{rdv}', [RendezVousController::class, 'update'])->name('rdv.update');
        });

        Route::prefix('/salaires')->group(function () {
            Route::get('/', [SalaireController::class, 'index'])->name('salaire.index');
            Route::post('/create', [SalaireController::class, 'store'])->name('salaire.store');
            Route::get('/create', [SalaireController::class, 'create'])->name('salaire.create');
            Route::get('/edit/{salaire}', [SalaireController::class, 'edit'])->name('salaire.edit');
            Route::get('/delete/{salaire}', [SalaireController::class, 'delete'])->name('salaire.delete');
            Route::get('/update/{salaire}', [SalaireController::class, 'update'])->name('salaire.update');
            Route::post('/salaire/search/', [SalaireController::class, 'search'])->name('salaire.search');
        });
    });
});