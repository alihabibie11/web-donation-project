<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\DonaturController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('/program', ProgramController::class);
Route::get('/detail/{id?}', [HomeController::class, 'detail'])->name('detail');
Route::get('/detail_donasi/{id}', [HomeController::class, 'detail_donasi'])->name('detail_donasi');
Route::get('/list_program', [HomeController::class, 'list_program'])->name('list_program');
Route::post('/add_donation', [HomeController::class, 'add_donation'])->name('add_donation');
Route::get('/cari_donasi', [HomeController::class, 'cari_donasi'])->name('cari_donasi');
Route::get('/cek_donasi', [HomeController::class, 'cek_donasi'])->name('cek_donasi');

Auth::routes();
Route::post('/register_admin', [RegisterController::class, 'create_admin'])->name('register.admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin middleware belum di set
Route::name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('home');
    Route::resource('/admin/program', ProgramController::class);
    Route::post('/admin/donasi', [DonationController::class, 'change_status'])->name('donasi.change_status');
    Route::resource('/admin/donasi', DonationController::class);
    Route::resource('/admin/donatur', DonaturController::class);
    Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('laporan');
    Route::get('/admin/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/admin/profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/admin/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
});

// user dashboard
Route::name('user.')->group(function () {
    Route::prefix('user')->group(function () {
        Route::resource('/', UserController::class);
        Route::get('/riwayat_donasi', [UserController::class, 'donation_history'])->name('riwayat_donasi');
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    });
});
