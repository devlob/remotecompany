<?php

use App\Models\Link;
use App\Models\Pdf;
use App\Models\Snippet;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'pdfs' => Pdf::all(),
        'snippets' => Snippet::all(),
        'links' => Link::all(),
    ]);
});

Route::get('/admin', function () {
    return view('admin', [
        'pdfs' => Pdf::all(),
        'snippets' => Snippet::all(),
        'links' => Link::all(),
    ]);
});
