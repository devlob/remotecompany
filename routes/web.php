<?php

use App\Models\Link;
use App\Models\Pdf;
use App\Models\Snippet;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'pdfs' => Pdf::latest()->get(),
        'snippets' => Snippet::latest()->get(),
        'links' => Link::latest()->get(),
    ]);
});

Route::get('/admin', function () {
    return view('admin', [
        'pdfs' => Pdf::latest()->get(),
        'snippets' => Snippet::latest()->get(),
        'links' => Link::latest()->get(),
    ]);
});
