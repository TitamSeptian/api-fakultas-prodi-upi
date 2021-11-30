<?php

use App\Http\Controllers\FakultasProdiController;
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

Route::get("/fakultas-prodi", [FakultasProdiController::class, "getFakultasProdi"]);
Route::get("/fakultas", [FakultasProdiController::class, "getFakultas"]);
Route::get("/fakultas/{namaFakultas}/prodi", [FakultasProdiController::class, "getProdiByFakultas"]);
Route::get("/prodi", [FakultasProdiController::class, "getProdi"]);
Route::get("/prodi/{kodeProdi}", [FakultasProdiController::class, "getProdiByKode"]);
