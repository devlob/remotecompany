<?php

namespace App\Http\Controllers\PDFs;

use App\Http\Controllers\Controller;
use App\Models\Pdf;

class DeletePdfController extends Controller
{
    public function __invoke(Pdf $pdf)
    {
        $pdf->delete();

        return response()->noContent();
    }
}
