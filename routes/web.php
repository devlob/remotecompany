<?php

use App\Models\Pdf;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin', [
        'pdfs' => Pdf::all(),
    ]);
});
