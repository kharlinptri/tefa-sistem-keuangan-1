<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PengeluaranController;

// ROLE : Admin; KepalaSekolah; Bendahara; OrangTua; Siswa; Kantin; Laundry;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::group([
    'middleware' => ['auth:api']
], function () {
    Route::post('logout', [LogoutController::class, 'logout']);


    // pengeluaran
   Route::post('pengeluaran/kategori', [PengeluaranController::class, 'addPengeluaranKategori']);

});

Route::post('orangtua', [OrangTuaController::class, 'store']);
Route::patch('orangtua/{id}', [OrangTuaController::class, 'update']);
Route::delete('orangtua/{id}', [OrangTuaController::class, 'destroy']);