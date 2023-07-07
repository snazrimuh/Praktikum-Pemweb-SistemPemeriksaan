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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

use App\Http\Controllers\IbuController;

Route::get('/ibu', [IbuController::class, 'index'])->name('ibu.index');
Route::get('/ibu/create', [IbuController::class, 'create'])->name('ibu.create');
Route::post('/ibu', [IbuController::class, 'store'])->name('ibu.store');
Route::get('/ibu/{ibu}/edit', [IbuController::class, 'edit'])->name('ibu.edit');
Route::put('/ibu/{ibu}', [IbuController::class, 'update'])->name('ibu.update');
Route::delete('/ibu/{ibu}', [IbuController::class, 'destroy'])->name('ibu.destroy');
Route::get('/ibu_user', [IbuController::class, 'index_user'])->name('user.ibu_index');

use App\Http\Controllers\RiwayatKehamilanController;

Route::get('/riwayat-kehamilan', [RiwayatKehamilanController::class, 'index'])->name('riwayat-kehamilan.index');
Route::get('/riwayat-kehamilan/create', [RiwayatKehamilanController::class, 'create'])->name('riwayat-kehamilan.create');
Route::post('/riwayat-kehamilan', [RiwayatKehamilanController::class, 'store'])->name('riwayat-kehamilan.store');
Route::get('/riwayat-kehamilan_user', [RiwayatKehamilanController::class, 'index_user'])->name('user.kehamilan_index');

use App\Http\Controllers\PemeriksaanKehamilanController;

Route::get('riwayat-kehamilan/create', [RiwayatKehamilanController::class, 'create'])->name('riwayat-kehamilan.create');
Route::post('riwayat-kehamilan', [RiwayatKehamilanController::class, 'store'])->name('riwayat-kehamilan.store');
Route::get('riwayat-kehamilan/{id}/pemeriksaan/create', [PemeriksaanKehamilanController::class, 'create'])->name('riwayat-kehamilan.pemeriksaan.create');
Route::post('riwayat-kehamilan/{id}/pemeriksaan', [PemeriksaanKehamilanController::class, 'store'])->name('riwayat-kehamilan.pemeriksaan.store');
Route::get('riwayat-kehamilan/{id}/pemeriksaan', [PemeriksaanKehamilanController::class, 'index'])->name('riwayat-kehamilan.pemeriksaan.index');

use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeUser']);
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboarduser', [AuthController::class, 'dashboard'])->name('user.dashboard');
});

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Gate;

Route::middleware(['auth', 'admin', 'can:isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


