<?php

use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'revalidate'], function()
{
    // Routes yang mau di revalidate masukan di sini

    Route::prefix('/dashboard')->middleware(['auth'])->group(function () {

        //dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //permohonan
        Route::get('/permohonan', [OrderController::class, 'index'])->name('permohonan');
        Route::get('/permohonan/batal', [OrderController::class, 'batal'])->name('permohonan.batal');
        Route::get('/permohonan/diterima', [OrderController::class, 'diterima'])->name('permohonan.diterima');
        Route::get('/permohonan/menunggu-pembayaran', [OrderController::class, 'menungguPembayaran'])->name('permohonan.menunggupembayaran');
        Route::get('/permohonan/diproses', [OrderController::class, 'diproses'])->name('permohonan.diproses');
        Route::get('/permohonan/selesai', [OrderController::class, 'selesai'])->name('permohonan.selesai');
        Route::get('/permohonan/bermasalah', [OrderController::class, 'bermasalah'])->name('permohonan.bermasalah');


        Route::get('/permohonan/{id}/edit', [OrderController::class, 'edit'])->name('permohonan.edit');
        Route::put('/permohonan/{id}/update', [OrderController::class, 'update'])->name('permohonan.update');
        Route::delete('/permohonan/{id}/delete', [OrderController::class, 'destroy'])->name('permohonan.destroy');


        //Prices
        Route::get('/tarif', [PriceController::class, 'index'])->name('tarif');
        Route::get('/tarif/tambah', [PriceController::class, 'create'])->name('tarif.tambah');
        Route::post('/tarif/store', [PriceController::class, 'store'])->name('tarif.store');
        Route::get('/tarif/edit/{id}', [PriceController::class, 'edit'])->name('tarif.edit');
        Route::put('/tarif/update/{id}', [PriceController::class, 'update'])->name('tarif.update');
        Route::delete('/tarif/delete/{id}', [PriceController::class, 'delete'])->name('tarif.delete');
    });

    Route::get('/form', [OrderController::class, 'create'])->name('order');
    Route::post('/form', [OrderController::class, 'store'])->name('order.store');

    Route::get('/monitoring', [HomeController::class, 'monitoring'])->name('monitoring');
    Route::post('/monitoring', [HomeController::class, 'monitoringCek'])->name('monitoring.cek');

    Route::get('/monitoring/{id}', [HomeController::class, 'sukses'])->name('order.sukses');
    Route::get('/monitoring/{id}/export', [HomeController::class, 'pdf'])->name('order.pdf');

    Route::get('/konfirmasi', [ConfirmationController::class, 'index'])->name('konfirmasi');
    Route::post('/konfirmasi', [ConfirmationController::class, 'store'])->name('konfirmasi.store');


});






require __DIR__ . '/auth.php';
