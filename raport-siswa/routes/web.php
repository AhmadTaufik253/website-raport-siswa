<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatapelajaranController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::redirect('/', '/login');

Route::group(['middleware' => 'auth', 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/change-password-admin', [ChangePassword::class, 'changepass'])->name('changepass-admin');
    Route::post('/change-password-admin/{id}', [ChangePassword::class, 'updatepass'])->name('updatepass-admin');

    Route::resource('siswa', UserController::class);
    Route::resource('matapelajaran', MatapelajaranController::class);
    Route::resource('raport', RaportController::class);
    Route::resource('admin', AdminController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [SiswaController::class, 'profile'])->name('profile');
    Route::get('/raport-siswa/{id}', [SiswaController::class, 'raport'])->name('raport-siswa');

    Route::get('/change-password', [SiswaController::class, 'changepass'])->name('changepass');
    Route::post('/change-password/{id}', [SiswaController::class, 'updatepass'])->name('updatepass');
});