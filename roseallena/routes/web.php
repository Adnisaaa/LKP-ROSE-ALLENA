<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\onlyStaff\AkunController;
use App\Http\Controllers\onlyStaff\KursusController;
use App\Http\Controllers\onlyStaff\BackdropController;
use App\Http\Controllers\onlyStaff\LogKursusController;
use App\Http\Controllers\onlyUser\LayananUserController;
use App\Http\Controllers\onlyUser\SewaBackropController;
use App\Http\Controllers\onlyStaff\LogBackdropController;
use App\Http\Controllers\onlyUser\DaftarKursusController;
use App\Http\Controllers\onlyStaff\LaporanKursusController;
use App\Http\Controllers\onlyStaff\LaporanBackdropController;

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

Route::get('/', [LoginController::class, 'index'])->name('login'); // Mengarahkan ke halaman login

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });


    Route::resource('akun', AkunController::class);
    Route::resource('log_kursus', LogKursusController::class);
    Route::resource('log_backdrop', LogBackdropController::class);
    Route::resource('kursus', KursusController::class);
    Route::resource('backdrop', BackdropController::class);
    
    Route::resource('laporan_backdrop', LaporanBackdropController::class);
    Route::post('/laporan-backdrop/filter', [LaporanBackdropController::class, 'filter'])->name('laporan_backdrop.filter');
    Route::resource('laporan_kursus', LaporanKursusController::class);
    Route::post('/laporan-kursus/filter', [LaporanKursusController::class, 'filter'])->name('laporan_kursus.filter');
});

// owner hanya bisa lihat + nambah admin
Route::prefix('owner')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('owner.dashboard');
    });

    Route::resource('akun', AkunController::class);
    Route::resource('log_kursus', LogKursusController::class);
    Route::resource('log_backdrop', LogBackdropController::class);
    Route::resource('kursus', KursusController::class);
    Route::resource('backdrop', BackdropController::class);
    Route::resource('laporan_backdrop', LaporanBackdropController::class);
    Route::post('/laporan-backdrop/filter', [LaporanBackdropController::class, 'filter'])->name('laporan_backdrop.filter');
    Route::resource('laporan_kursus', LaporanKursusController::class);
    Route::post('/laporan-kursus/filter', [LaporanKursusController::class, 'filter'])->name('laporan_kursus.filter');
});

Route::resource('/register', RegisterController::class);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::resource('/user', LayananUserController::class);
// Route::get('/sewa-backdrop', [SewaBackropController::class, 'index'])->name('sewa-backdrop');
// Route::get('/daftar-kursus', [DaftarKursusController::class, 'index'])->name('daftar-kursus');
// Route::resource('/sewa-backdrop', SewaBackropController::class);
// Route::resource('/daftar-kursus', DaftarKursusController::class);
