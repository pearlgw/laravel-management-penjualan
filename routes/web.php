<?php

use App\Http\Controllers\AdmingudangController;
use App\Http\Controllers\AdminkasirController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DetailstokgudangController;
use App\Http\Controllers\DetailstoktokoController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\HistoriTransaksi;
use App\Http\Controllers\JenisbarangController;
use App\Http\Controllers\KetersediaanbarangController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PrintsuratjalanController;
use App\Http\Controllers\PrinttransaksiController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\TotalstokgudangController;
use App\Http\Controllers\TotalstoktokoController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Barang;
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

//  jika user belum login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);
});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/superadmin', [SuperadminController::class, 'index']);

    Route::resource('/gudang', GudangController::class);
    Route::resource('/toko', TokoController::class);
    Route::resource('/pemasok', PemasokController::class);
    Route::resource('/jenis_barang', JenisbarangController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/role', RoleController::class);
});

// untuk admin gudang
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/admingudang', [AdmingudangController::class, 'index']);
});

// untuk admin kasir
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    Route::get('/adminkasir', [AdminkasirController::class, 'index']);
    Route::get('/ketersediaan-barang', [KetersediaanbarangController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
    Route::resource('/barang', BarangController::class);

    Route::resource('/detail-stok-gudang', DetailstokgudangController::class);
    Route::get('/total-stok-gudang', [TotalstokgudangController::class, 'index']);
    Route::get('/total-stok-gudang/{id}', [TotalstokgudangController::class, 'databarang']);

    Route::resource('/detail-stok-toko', DetailstoktokoController::class);
    Route::get('/total-stok-toko', [TotalstoktokoController::class, 'index']);
    Route::get('/total-stok-toko/{id}', [TotalstoktokoController::class, 'databarang']);

    Route::get('/surat-jalan/{id}', [PrintsuratjalanController::class, 'print']);
});


// untuk admin gudang
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/admingudang', [AdmingudangController::class, 'index']);
});

// untuk admin kasir
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    Route::get('/adminkasir', [AdminkasirController::class, 'index']);
    Route::resource('/transaksi', TransaksiController::class);
    Route::get('/ketersediaan-barang', [KetersediaanbarangController::class, 'index']);
    Route::resource('/customer', CustomerController::class);
});