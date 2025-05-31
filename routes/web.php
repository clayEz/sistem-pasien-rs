<?php

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

use App\Http\Controllers\PasienController;

Route::get('/', function () {
    return view('create');
});

Route::get('/daftarpasien', function () {
    return view('daftarpasien');
});
Route::get('/daftar-pasien', [PasienController::class, 'daftarPasien'])
     ->name('daftar.pasien');

// Route untuk API data pasien (optional)
Route::get('/pasien/data', [PasienController::class, 'getDataPasien'])
     ->name('pasien.data');