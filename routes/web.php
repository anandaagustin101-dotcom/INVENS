<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;


Route::get('/', function () {
    return view('auth.login');
});


Auth::routes([
    'register' => false,
    'reset'=> false,
    'verify'=> false, 
    'confirm'=> false
]);

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/'); 
})->name('logout');

Route::group([
    'middleware' => ['auth']

], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/barang-masuk', App\Http\Controllers\BarangMasukController::class);

    Route::resource('/barang-keluar', App\Http\Controllers\BarangKeluarController::class);

    Route::resource('/databarang', App\Http\Controllers\DatabarangController::class);

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPdf'])->name('laporan.export.pdf');
    Route::get('/laporan/{id}/detail', [LaporanController::class, 'detail'])->name('laporan.detail');

    Route::resource('/admin',App\Http\Controllers\AdminController::class);

});



