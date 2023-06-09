<?php

use App\Http\Controllers\HistoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\TunggakanController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('home_master', HomeController::class);
Route::resource('spp', SppController::class);
Route::resource('tunggak', TunggakanController::class);
Route::resource('kelas', KelasController::class);
Route::resource('petugas', UserController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::resource('tunggakan', TunggakanController::class);  
Route::resource('laporan', LaporanController::class);  
Route::resource('histori', HistoriController::class);  

// route untuk logout
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/struk/{id}', [LaporanController::class, 'struk'])->middleware(['auth'])->name('struk');
Route::get('/exportpdf', [LaporanController::class, 'exportpdf'])->middleware(['auth'])->name('exportpdf');
Route::get('/spp/pdf', [SppController::class, 'createPDF']);

require __DIR__.'/auth.php';
