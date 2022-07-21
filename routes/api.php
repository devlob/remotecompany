<?php

use App\Http\Controllers\PDFs\CreatePdfController;
use App\Http\Controllers\PDFs\DeletePdfController;
use App\Http\Controllers\PDFs\EditPdfController;
use Illuminate\Support\Facades\Route;

Route::post('/pdfs', CreatePdfController::class);
Route::put('/pdfs/{pdf}', EditPdfController::class);
Route::delete('/pdfs/{pdf}', DeletePdfController::class);
