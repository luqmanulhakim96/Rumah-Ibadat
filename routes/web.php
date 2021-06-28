<?php

use App\Http\Middleware\SuperAdmin;
use Illuminate\Support\Facades\Route;
// use Auth;
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

Route::get('/password/resets/{token}/{ic_number}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Auth::routes();


//AUTHENTICATE ROUTE
Route::middleware(['auth'])->group(function () {
    Route::get('/tukar-kata-laluan', [App\Http\Controllers\HomeController::class, 'change_password'])->name('tukar-kata-laluan');
    Route::post('/tukar-kata-laluan/kemaskini', [App\Http\Controllers\GeneralController::class, 'update_password'])->name('tukar-kata-laluan.kemaskini');
});


//USER ROUTE
Route::middleware([User::class])->group(function(){
    Route::get('/halaman-utama', [App\Http\Controllers\UserController::class, 'index_user'])->name('user.halaman-utama');

    Route::get('/halaman-utama/kemaskini-profil', [App\Http\Controllers\UserController::class, 'update_profile_pengguna'])->name('users.kemaskini-profil');

    Route::post('/halaman-utama/kemaskini-profil-update', [App\Http\Controllers\UserController::class, 'update_profile'])->name('users.kemaskini-profil-update');


    //Rumah Ibadat
    Route::get('/halaman-utama/rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'pilih_rumah_ibadat'])->name('users.rumah-ibadat.pilih');

    Route::get('/halaman-utama/rumah-ibadat/daftar-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'daftar_rumah_ibadat'])->name('users.rumah-ibadat.daftar');

    Route::post('/halaman-utama/rumah-ibadat/daftar-rumah-ibadat/daftar', [App\Http\Controllers\RumahIbadatController::class, 'tambah_rumah_ibadat'])->name('users.rumah-ibadat.daftar.tambah');

    Route::get('/halaman-utama/rumah-ibadat/permohonan-tukar-hak-milik-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'menukar_rumah_ibadat'])->name('users.rumah-ibadat.menukar');

    Route::get('/halaman-utama/rumah-ibadat/kemaskini-profil-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'profil_rumah_ibadat'])->name('users.rumah-ibadat.kemaskini');

    Route::post('/halaman-utama/rumah-ibadat/profil-rumah-ibadat/kemaskini', [App\Http\Controllers\RumahIbadatController::class, 'update_rumah_ibadat'])->name('users.rumah-ibadat.kemaskini.update');

    //Permohonan
    Route::get('/halaman-utama/permohonan', [App\Http\Controllers\PermohonanController::class, 'pilih_permohonan'])->name('users.permohonan.pilih');

    Route::get('/halaman-utama/permohonan/permohonan-baru', [App\Http\Controllers\PermohonanController::class, 'permohonan_baru'])->name('users.permohonan.baru');

    Route::post('/halaman-utama/permohonan/permohonan-baru/hantar', [App\Http\Controllers\PermohonanController::class, 'permohonan_hantar'])->name('users.permohonan.baru.hantar');


    Route::get('/halaman-utama/permohonan/permohonan-sedang-diproses', [App\Http\Controllers\PermohonanController::class, 'permohonan_proses'])->name('users.permohonan.sedang-diproses');

    Route::get('/halaman-utama/permohonan/permohonan-sedang-diproses/batal', [App\Http\Controllers\PermohonanController::class, 'batal_permohonan'])->name('users.permohonan.sedang-diproses.batal');

    Route::get('/halaman-utama/permohonan/permohonan-sedang-diproses/papar-permohonan', [App\Http\Controllers\PermohonanController::class, 'papar_permohonan_sedang_diproses'])->name('users.permohonan.papar-sedang-diproses');

    Route::get('/halaman-utama/permohonan/permohonan-sedang-diproses/semakan-semula-permohonan', [App\Http\Controllers\PermohonanController::class, 'permohonan_semakan_semula'])->name('users.permohonan.semak-semula');

    Route::post('/halaman-utama/permohonan/permohonan-sedang-diproses/semakan-semula-permohonan/hantar', [App\Http\Controllers\PermohonanController::class, 'hantar_permohonan_semakan_semula'])->name('users.permohonan.semak-semula.hantar');

    Route::get('/halaman-utama/permohonan/permohonan-lulus', [App\Http\Controllers\PermohonanController::class, 'permohonan_lulus'])->name('users.permohonan.lulus');

    Route::get('/halaman-utama/permohonan/permohonan-tidak-lulus', [App\Http\Controllers\PermohonanController::class, 'permohonan_tidak_lulus'])->name('users.permohonan.tidak-lulus');

});

//EXCO ROUTE
Route::middleware([Exco::class])->group(function () {
    Route::get('/dashboard-pejabat-exco', [App\Http\Controllers\ExcoController::class, 'dashboard'])->name('excos.dashboard');

    //download API
    Route::get('/dashboard-pejabat-exco/muat-turun/permohonan', [App\Http\Controllers\ExcoController::class, 'download_permohonan'])->name('muat-turun.permohonan');

    // Permohonan
    Route::get('/dashboard-pejabat-exco/permohonan', [App\Http\Controllers\ExcoController::class, 'permohonan'])->name('excos.permohonan.pilih');


    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-baru', [App\Http\Controllers\ExcoController::class, 'permohonan_baru'])->name('excos.permohonan.baru');
    
    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-baru/maklumat-permohonan', [App\Http\Controllers\ExcoController::class, 'papar_permohonan'])->name('excos.permohonan.papar');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-baru/maklumat-permohonan/semak-semula', [App\Http\Controllers\ExcoController::class, 'permohonan_semak_semula'])->name('excos.permohonan.papar.semak-semula');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-baru/maklumat-permohonan/sahkan', [App\Http\Controllers\ExcoController::class, 'permohonan_pengesahan'])->name('excos.permohonan.papar.sahkan');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-baru/maklumat-permohonan/batalkan', [App\Http\Controllers\ExcoController::class, 'permohonan_pembatalan'])->name('excos.permohonan.papar.batalkan');

    
    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-sedang-diproses', [App\Http\Controllers\ExcoController::class, 'permohonan_sedang_diproses'])->name('excos.permohonan.sedang-diproses');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-sedang-diproses/maklumat-permohonan', [App\Http\Controllers\ExcoController::class, 'papar_permohonan_sedang_diproses'])->name('excos.permohonan.sedang-diproses.papar');

    
    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-semakan-semula', [App\Http\Controllers\ExcoController::class, 'permohonan_semakan_semula'])->name('excos.permohonan.semakan-semula');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-semakan-semula/maklumat-permohonan', [App\Http\Controllers\ExcoController::class, 'papar_permohonan_semakan_semula'])->name('excos.permohonan.semakan-semula.papar');

    
    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-lulus', [App\Http\Controllers\ExcoController::class, 'permohonan_lulus'])->name('excos.permohonan.lulus');

    
    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-tidak-lulus', [App\Http\Controllers\ExcoController::class, 'permohonan_tidak_lulus'])->name('excos.permohonan.tidak-lulus');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-tidak-lulus/maklumat-permohonan', [App\Http\Controllers\ExcoController::class, 'papar_permohonan_tidak_lulus'])->name('excos.permohonan.tidak-lulus.papar');

    //  Rumah Ibadat
    Route::get('/dashboard-pejabat-exco/rumah-ibadat', [App\Http\Controllers\ExcoController::class, 'rumah_ibadat'])->name('excos.rumah-ibadat');

    Route::get('/dashboard-pejabat-exco/rumah-ibadat/senarai-rumah-ibadat', [App\Http\Controllers\ExcoController::class, 'senarai_rumah_ibadat'])->name('excos.rumah-ibadat.senarai');

    Route::get('/dashboard-pejabat-exco/rumah-ibadat/senarai-rumah-ibadat/maklumat-rumah-ibadat', [App\Http\Controllers\ExcoController::class, 'papar_rumah_ibadat'])->name('excos.rumah-ibadat.senarai.papar');

});

//YB ROUTE
Route::middleware([Yb::class])->group(function () {
    Route::get('/dashboard-pejabat-yb-pengerusi', [App\Http\Controllers\YbController::class, 'dashboard'])->name('ybs.dashboard');


    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan', [App\Http\Controllers\YbController::class, 'permohonan'])->name('ybs.permohonan.pilih');


    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan/permohonan-baru', [App\Http\Controllers\YbController::class, 'permohonan_baru'])->name('ybs.permohonan.baru');

    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan/permohonan-baru/maklumat-permohonan', [App\Http\Controllers\YbController::class, 'papar_permohonan'])->name('ybs.permohonan.papar');

    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan/permohonan-baru/maklumat-permohonan/semak-semula', [App\Http\Controllers\YbController::class, 'permohonan_semak_semula'])->name('ybs.permohonan.papar.semak-semula');

    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan/permohonan-baru/maklumat-permohonan/sahkan', [App\Http\Controllers\YbController::class, 'permohonan_pengesahan'])->name('ybs.permohonan.papar.sahkan');

    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan/permohonan-baru/maklumat-permohonan/batalkan', [App\Http\Controllers\YbController::class, 'permohonan_pembatalan'])->name('ybs.permohonan.papar.batalkan');


    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan/permohonan-sedang-diproses', [App\Http\Controllers\YbController::class, 'permohonan_sedang_diproses'])->name('ybs.permohonan.sedang-diproses');

    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan/permohonan-sedang-diproses/maklumat-permohonan', [App\Http\Controllers\YbController::class, 'papar_permohonan_sedang_diproses'])->name('ybs.permohonan.sedang-diproses.papar');

   
    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan/permohonan-semakan-semula', [App\Http\Controllers\YbController::class, 'permohonan_semakan_semula'])->name('ybs.permohonan.semak-semula');

    
    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan/permohonan-lulus', [App\Http\Controllers\YbController::class, 'permohonan_lulus'])->name('ybs.permohonan.lulus');

   
    Route::get('/dashboard-pejabat-yb-pengerusi/permohonan/permohonan-tidak-lulus', [App\Http\Controllers\YbController::class, 'permohonan_tidak_lulus'])->name('ybs.permohonan.tidak-lulus');

});

//UPEN ROUTE
Route::middleware([Upen::class])->group(function () {
    Route::get('/dashboard-pejabat-upen', [App\Http\Controllers\UpenController::class, 'dashboard'])->name('upens.dashboard');

    Route::get('/dashboard-pejabat-upen/permohonan', [App\Http\Controllers\UpenController::class, 'permohonan'])->name('upens.permohonan.pilih');

    Route::get('/dashboard-pejabat-upen/permohonan/permohonan-baru', [App\Http\Controllers\UpenController::class, 'permohonan_baru'])->name('upens.permohonan.baru');

    Route::get('/dashboard-pejabat-upen/permohonan/permohonan-baru/maklumat-permohonan', [App\Http\Controllers\UpenController::class, 'papar_permohonan'])->name('upens.permohonan.papar');

    Route::get('/dashboard-pejabat-upen/permohonan/permohonan-baru/maklumat-permohonan/semak-semula', [App\Http\Controllers\UpenController::class, 'permohonan_semak_semula'])->name('upens.permohonan.papar.semak-semula');

    Route::get('/dashboard-pejabat-upen/permohonan/permohonan-baru/maklumat-permohonan/batalkan', [App\Http\Controllers\UpenController::class, 'permohonan_pembatalan'])->name('upens.permohonan.papar.batalkan');

    Route::get('/dashboard-pejabat-upen/permohonan/permohonan-baru/maklumat-permohonan/sahkan', [App\Http\Controllers\UpenController::class, 'permohonan_pengesahan'])->name('upens.permohonan.papar.sahkan');

    Route::get('/dashboard-pejabat-upen/permohonan/permohonan-semak-semula', [App\Http\Controllers\UpenController::class, 'permohonan_semak_semula_list'])->name('upens.permohonan.semak-semula');

    Route::get('/dashboard-pejabat-upen/permohonan/permohonan-khas', [App\Http\Controllers\UpenController::class, 'permohonan_khas'])->name('upens.permohonan.khas');

});


//ADMIN ROUTE
Route::middleware([Admin::class])->group(function () {

    Route::get('/dashboard-admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admins.dashboard');

    // Pengguna
    Route::get('/dashboard-admin/pengguna', [App\Http\Controllers\AdminController::class, 'pengguna'])->name('admins.pengguna.pilih');

    Route::get('/dashboard-admin/pengguna/senarai-pemohon', [App\Http\Controllers\AdminController::class, 'pemohon'])->name('admins.pengguna.pemohon');

    Route::get('/dashboard-admin/pengguna/senarai-pengguna-dalaman', [App\Http\Controllers\AdminController::class, 'pengguna_dalaman'])->name('admins.pengguna.pengguna-dalaman');
});


//SUPER ADMIN ROUTE (not used)
Route::middleware([SuperAdmin::class])->group(function () {
    Route::get('/super-admin/halaman-utama', [App\Http\Controllers\HomeController::class, 'index_super_admin'])->name('super-admin.halaman-utama');
});


