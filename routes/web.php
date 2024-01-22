<?php

use App\Http\Controllers\QueueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

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

Route::get('/', [DocumentController::class, 'importIndex'])->name('import.form');
Route::get('/document', [DocumentController::class, 'index'])->name('document');
Route::post('/import', [DocumentController::class, 'importDocuments']);
Route::get('/run-queue', [QueueController::class, 'runQueue']);

