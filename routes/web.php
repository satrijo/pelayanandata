<?php

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

Route::get('/', function () {
    return view('front.home');
});

Route::get('/form', [OrderController::class, 'create'])->name('order');
Route::post('/form', [OrderController::class, 'store'])->name('order.store');
Route::get('/monitoring/{id}', [OrderController::class, 'sukses'])->name('order.sukses');
Route::get('/monitoring/{id}/export', [OrderController::class, 'pdf'])->name('order.pdf');

Route::get('/konfirmasi', [OrderController::class, 'konfirmasi'])->name('konfirmasi');


Route::prefix('/dashboard')->middleware(['auth'])->group(function () {

    //dashboard
    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    //permohonan
    Route::get('/permohonan', [OrderController::class, 'index'])->name('permohonan');
    Route::get('/permohonan/json', [OrderController::class, 'getJson'])->name('permohonanjson');
    Route::get('/permohonan/{id}/edit', [OrderController::class, 'edit'])->name('permohonan.edit');
    Route::put('/permohonan/{id}/update', [OrderController::class, 'update'])->name('permohonan.update');

    //Prices
    Route::get('/tarif', [PriceController::class, 'create'])->name('tarif');
    Route::post('/tarif/store', [PriceController::class, 'store'])->name('tarif.store');
    Route::get('/tarif/edit/{id}', [PriceController::class, 'edit'])->name('tarif.edit');
    Route::put('/tarif/update/{id}', [PriceController::class, 'update'])->name('tarif.update');
    Route::delete('/tarif/delete/{id}', [PriceController::class, 'delete'])->name('tarif.delete');
});

require __DIR__ . '/auth.php';
