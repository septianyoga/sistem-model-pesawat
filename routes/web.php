<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EBOMController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MBOMController;
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

    Route::group(['middleware' => 'userAkses:Admin,Direktorat Teknologi'], function () {
        Route::get('/model_referensi', [ModelReferensiController::class, 'index'])->name('model_referensi');
        Route::get('/model_referensi/add', [ModelReferensiController::class, 'create'])->name('model_referensi');
        Route::post('/model_referensi', [ModelReferensiController::class, 'store']);
        Route::get('/model_referensi/{id}', [ModelReferensiController::class, 'destroy'])->name('model_referensi');
        Route::get('/model_referensi/{id}/edit', [ModelReferensiController::class, 'edit'])->name('model_referensi');
        Route::patch('/model_referensi/{id}', [ModelReferensiController::class, 'update']);
        Route::post('/model_referensi/import', [ModelReferensiController::class, 'import']);
        Route::get('/download_template_excel', [ModelReferensiController::class, 'downloadTemplate'])->name('download_template_excel');

        Route::get('/ebom', [EBOMController::class, 'index'])->name('ebom');
        Route::get('/ebom/add', [EBOMController::class, 'create'])->name('ebom.add');
        Route::get('/ebom/{id}', [EBOMController::class, 'destroy']);
        Route::get('/ebom/{id}/edit', [EBOMController::class, 'edit'])->name('ebom');
        Route::post('/ebom', [EBOMController::class, 'store']);
        Route::patch('/ebom/{id}', [EBOMController::class, 'update']);
        Route::post('/ebom/import', [EBOMController::class, 'import']);
        Route::get('/download_ebom_template', [EBOMController::class, 'download'])->name('download_ebom_template');

        Route::get('/mbom', [MBOMController::class, 'index'])->name('mbom');
        Route::get('/mbom/add', [MBOMController::class, 'create'])->name('mbom.add');
        Route::get('/mbom/{id}', [MBOMController::class, 'destroy']);
        Route::get('/mbom/{id}/edit', [MBOMController::class, 'edit'])->name('mbom');
        Route::post('/mbom', [MBOMController::class, 'store']);
        Route::patch('/mbom/{id}', [MBOMController::class, 'update']);
        Route::post('/mbom/import', [MBOMController::class, 'import']);
        Route::get('/download_mbom_template', [MBOMController::class, 'download'])->name('download_mbom_template');
    });


    Route::get('/profile', [ProfileController::class, 'index']);
    Route::patch('/profile', [ProfileController::class, 'update']);


    Route::group(['middleware' => 'userAkses:Admin,Direktorat Produksi'], function () {
        Route::get('/view_model', [ModelReferensiController::class, 'viewModel'])->name('view_model');
        Route::get('/view_model/{id}', [ModelReferensiController::class, 'show'])->name('view_model');
    });
});

Route::get('/logout', [AuthController::class, 'destroy']);
