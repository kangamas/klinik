<?php

use App\Http\Controllers\BerobatController;
use App\Http\Controllers\HomeController;
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

Route::get('/test', function () {
    $date = date_create("2021-01-08");
    echo date_format($date, 'j');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/berobat', [BerobatController::class, 'get_datas'])->name('berobat.index');
Route::get('/berobat-add', [BerobatController::class, 'add'])->name('berobat.add');
Route::post('/berobat-post', [BerobatController::class, 'store'])->name('berobat.store');
Route::get('/berobat-edit/{id_transaksi}', [BerobatController::class, 'edit'])->name('berobat.edit');
Route::patch('/berobat-update/{id_transaksi}', [BerobatController::class, 'update'])->name('berobat.update');
Route::delete('/berobat-delete/{id_transaksi}', [BerobatController::class, 'delete'])->name('berobat.delete');
