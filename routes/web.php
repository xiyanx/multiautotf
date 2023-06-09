<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MultiAutoTfController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [MultiAutoTfController::class, 'index']);
Route::post('/upload-excel-multi-auto-tf', [MultiAutoTfController::class, 'UploadMultiAutoTfExcel']);
Route::get('/load-data-trx-multi-auto-ajax', [MultiAutoTfController::class, 'LoadDataTrxMultiAutoAjax']);
Route::post('/export-data-trx-multi-auto-ajax', [MultiAutoTfController::class, 'ExportMultiAutoTfTxt'])->name('ExportMultiAutoTfTxt');
Route::get('/export-file-download', [MultiAutoTfController::class, 'ExportFileDowload'])->name('ExportFileDowload');
Route::get('/load-frame-proses1', [MultiAutoTfController::class, 'LoadFrameProses1'])->name('LoadFrameProses1');
Route::get('/load-frame-proses2', [MultiAutoTfController::class, 'LoadFrameProses2'])->name('LoadFrameProses2');
Route::get('/load-frame-proses3', [MultiAutoTfController::class, 'LoadFrameProses3'])->name('LoadFrameProses3');

Route::post('/store-input-fields', [MultiAutoTfController::class, 'store']);

