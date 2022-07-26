<?php

use App\Http\Controllers\Links\CreateLinkController;
use App\Http\Controllers\Links\DeleteLinkController;
use App\Http\Controllers\Links\EditLinkController;
use App\Http\Controllers\PDFs\CreatePdfController;
use App\Http\Controllers\PDFs\DeletePdfController;
use App\Http\Controllers\PDFs\EditPdfController;
use App\Http\Controllers\Snippets\CreateSnippetController;
use App\Http\Controllers\Snippets\DeleteSnippetController;
use App\Http\Controllers\Snippets\EditSnippetController;
use Illuminate\Support\Facades\Route;

Route::post('/pdfs', CreatePdfController::class);
Route::put('/pdfs/{pdf}', EditPdfController::class);
Route::delete('/pdfs/{pdf}', DeletePdfController::class);

Route::post('/snippets', CreateSnippetController::class);
Route::put('/snippets/{snippet}', EditSnippetController::class);
Route::delete('/snippets/{snippet}', DeleteSnippetController::class);

Route::post('/links', CreateLinkController::class);
Route::put('/links/{link}', EditLinkController::class);
Route::delete('/links/{link}', DeleteLinkController::class);
