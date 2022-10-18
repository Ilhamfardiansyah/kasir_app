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
Route::get('/tabletambah', [AddTableController::class, 'create'])->name('tabletambah');
Route::post('/barangbaru/create', [MasterController::class, 'store']);
Route::get('/suplaier', [SuplaierController::class, 'index'])->name('suplaier');
Route::get('/create', [SuplaierController::class, 'create'])->name('inputcreate');
Route::post('/create/data', [SuplaierController::class, 'store']);
Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::get('/update', [MasterController::class, 'cari']);
Route::post('/updatebarang', [MasterController::class, 'update']);
Route::get('/size', [SizeController::class, 'index'])->name('size');
Route::get('/print', [MasterController::class, 'print']);
Route::get('/printbulan', [MasterController::class, 'printmonth']);
Route::get('/profile_karyawan', [AccountController::class, 'view'])->name('profile_karyawan');
Route::get('/dashboard/update/{barcode}', [UpdateController::class, 'cari'])->name('update');
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('index');
Route::get('/jadwal', [TransaksiController::class, 'jadwal'])->name('jadwal');
Route::get('/cetak', [MasterController::class, 'index'])->name('barcode');
Route::get('/barcode', [MasterController::class, 'barcode']);







