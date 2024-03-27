<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ModelReferensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LandingPageController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::group(['middleware' => 'userAkses:Admin'], function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/user/{id}', [UserController::class, 'destroy']);
        Route::post('/user', [UserController::class, 'store']);
        Route::patch('/user/{id}', [UserController::class, 'update']);
    });

    Route::group(['middleware' => 'userAkses:Direktorat Teknologi'], function () {
        Route::get('/model_referensi', [ModelReferensiController::class, 'index'])->name('model_referensi');
        Route::get('/model_referensi/add', [ModelReferensiController::class, 'create'])->name('model_referensi');
        Route::post('/model_referensi', [ModelReferensiController::class, 'store']);
        Route::get('/model_referensi/{id}', [ModelReferensiController::class, 'destroy'])->name('model_referensi');
        Route::get('/model_referensi/{id}/edit', [ModelReferensiController::class, 'edit'])->name('model_referensi');
        Route::patch('/model_referensi/{id}', [ModelReferensiController::class, 'update']);
    });


    Route::get('/profile', [ProfileController::class, 'index']);
    Route::patch('/profile', [ProfileController::class, 'update']);


    Route::group(['middleware' => 'userAkses:Direktorat Produksi'], function () {
        Route::get('/view_model', [ModelReferensiController::class, 'viewModel'])->name('view_model');
    });
});

Route::get('/logout', [AuthController::class, 'destroy']);
