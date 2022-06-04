<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuplaierController;
use App\Http\Controllers\AccountController;


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
    return view('test', [
        'title' => 'Home'
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/barangbaru', [MasterController::class, 'index'])->name('barangbaru');
Route::get('/inputbarangbaru', [MasterController::class, 'create'])->name('inputbarangbaru');
Route::post('/barangbaru/create', [MasterController::class, 'store']);
Route::get('/suplaier', [SuplaierController::class, 'index'])->name('suplaier');
Route::get('/create', [SuplaierController::class, 'create'])->name('inputcreate');
Route::post('/create/data', [SuplaierController::class, 'store']);
Route::get('/account', [AccountController::class, 'index'])->name('account');


