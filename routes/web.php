<?php

use App\Http\Middleware\SuperAdmin;
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


//landing page
Route::get('/', function () {
    return view('welcome');
});
Route::get('/selamat-datang', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/tukar-kata-laluan', [App\Http\Controllers\HomeController::class, 'change_password'])->name('tukar-kata-laluan');

Auth::routes();


//USER ROUTE
Route::middleware([User::class])->group(function(){
    Route::get('/pengguna/halaman-utama', [App\Http\Controllers\HomeController::class, 'index_user'])->name('user.halaman-utama');

    Route::get('/pengguna/permohonan/baru', [App\Http\Controllers\PermohonanController::class, 'permohonan_baru'])->name('users.permohonan.baru');
});


//ADMIN ROUTE
Route::middleware([Admin::class])->group(function () {
    Route::get('/admin/halaman-utama', [App\Http\Controllers\HomeController::class, 'index_admin'])->name('admin.halaman-utama');
});


//SUPER ADMIN ROUTE
Route::middleware([SuperAdmin::class])->group(function () {
    Route::get('/super-admin/halaman-utama', [App\Http\Controllers\HomeController::class, 'index_super_admin'])->name('super-admin.halaman-utama');
});


