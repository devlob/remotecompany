<?php

namespace App\Http\Controllers\PDFs;

use App\Http\Controllers\Controller;
use App\Http\Requests\PDFs\EditPdfRequest;
use App\Models\Pdf;
use Illuminate\Support\Str;

class EditPdfController extends Controller
{
    public function __invoke(EditPdfRequest $request, Pdf $pdf)
    {
        $pdf->update([
            'title' => $request->get('title'),
            'path' => $request->file('pdf')
                ? $request->file('pdf')->store('/pdfs/' . Str::random(6))
                : $pdf->getRawOriginal('path'),
        ]);

        return response()->json([
            'data' => $pdf
        ]);
    }
}
