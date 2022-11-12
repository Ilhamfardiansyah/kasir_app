<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuplaierController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\SoController;
use App\Models\Rak;



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
// Route::get('/register' ,function(){
//     return view('auth.register');
// });

Route::get('/', function () {
    return view('auth.login', [
        'title' => 'Home'
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/barangbaru', [MasterController::class, 'index'])->name('barangbaru');
Route::get('/inputbarangbaru', [MasterController::class, 'create'])->name('inputbarangbaru');
Route::post('/barangbaru/create', [MasterController::class, 'store']);
Route::get('/update', [MasterController::class, 'cari']);
Route::get('/print', [MasterController::class, 'print']);
Route::get('/printbulan', [MasterController::class, 'printmonth']);
Route::get('/cetak', [MasterController::class, 'index'])->name('barcode');
Route::post('/cetak-barcode', [MasterController::class, 'cetakBarcode'])->name('cetak_barcode');
Route::get('/barcode', [MasterController::class, 'barcode']);
Route::get('/data_rak/{rak:id}', [MasterController::class, 'show']);

Route::get('/tabletambah', [AddTableController::class, 'create'])->name('tabletambah');

Route::get('/suplaier', [SuplaierController::class, 'index'])->name('suplaier');
Route::get('/create', [SuplaierController::class, 'create'])->name('inputcreate');
Route::post('/create/data', [SuplaierController::class, 'store']);

Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::get('/profile_karyawan', [AccountController::class, 'view'])->name('profile_karyawan');

Route::post('/updatebarang/{id}', [UpdateController::class, 'update']);
Route::get('/dashboard/update/{barcode}', [UpdateController::class, 'cari'])->name('update');

Route::get('/size', [SizeController::class, 'index'])->name('size');
Route::post('/create/size', [SizeController::class, 'store'])->name('size');
Route::delete('/hapus/{id}', [SizeController::class, 'destroy'])->name('size');

Route::get('/transaksi', [TransaksiController::class, 'cari'])->name('menu');
Route::post('/kasir-post', [TransaksiController::class, 'store']);
Route::get('/nguranginStok/{id}/{qty}', [TransaksiController::class, 'nguranginStok']);
Route::get('/jadwal', [TransaksiController::class, 'jadwal'])->name('jadwal');
Route::get('/dashboard/cari', [TransaksiController::class, 'cari'])->name('jadwal');

Route::get('/kategori', [KategoriController::class, 'index'])->name('index');
Route::post('/create/kategori', [KategoriController::class, 'store'])->name('index');
Route::get('/kategori', [KategoriController::class, 'index'])->name('index');

Route::get('/rak', [RakController::class, 'index'])->name('index');
Route::post('/create/rak', [RakController::class, 'store'])->name('store');
Route::delete('/hapus_rak/{id}', [RakController::class, 'destroy'])->name('size');

Route::get('/stokopname', [SoController::class, 'index'])->name('stokupname');












