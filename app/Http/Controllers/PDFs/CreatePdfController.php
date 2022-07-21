<?php

namespace App\Http\Controllers\PDFs;

use App\Http\Controllers\Controller;
use App\Http\Requests\PDFs\CreatePdfRequest;
use App\Models\Pdf;
use Illuminate\Support\Str;

class CreatePdfController extends Controller
{
    public function __invoke(CreatePdfRequest $request)
    {
        $pdf = Pdf::create([
            'title' => $request->get('title'),
            'path' => $request->file('pdf')->store('/pdfs/' . Str::random(6)),
        ]);

        return response()->json([
            'data' => $pdf
        ], 201);
    }
}
