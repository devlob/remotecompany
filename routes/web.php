<?php

use App\Models\Pdf;
use App\Models\Snippet;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin', [
        'pdfs' => Pdf::all(),
        'snippets' => Snippet::all(),
    ]);
});
