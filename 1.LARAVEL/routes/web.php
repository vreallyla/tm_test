<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PoliController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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
    return redirect()->route('poli.index');
});

Route::get('/jadwal/export', [JadwalController::class, 'printout'])->name('jadwal.export');
Route::resource('/jadwal', JadwalController::class)->except([
    'show', 'edit', 'create', 'update'

]);
Route::resource('/poli', PoliController::class)->except([
    'show'
]);
Route::resource('/pegawai', PegawaiController::class)->except([
    'show'
]);
