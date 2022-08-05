<?php

use App\Models\MJadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('jadwal-check', function (Request $request) {
$data=MJadwal::where('m_pegawai_id', $request->m_pegawai_id)
->where('hari_id', $request->hari_id)
->select(
    'jam_masuk',
    'jam_pulang',
)
->first();
    return response()->json($data??[]);
})->name('jadwal.check');
