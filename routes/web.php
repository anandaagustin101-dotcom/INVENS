<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset'=> false,
    'verify'=> false, 
    'confirm'=> false
]);

Route::group([
    'middleware' => ['auth']

], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/barang-masuk', App\Http\Controllers\BarangMasukController::class);

    Route::resource('/barang-keluar', App\Http\Controllers\BarangKeluarController::class);

    Route::resource('/databarang', App\Http\Controllers\DatabarangController::class);

    Route::resource('/admin',App\Http\Controllers\AdminController::class);

    Route::get('/ubah-profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('ubah-profil');
    Route::POST('/ubah-profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('ubah-profil.update');

});



