<?php

namespace App\Http\Controllers\Snippets;

use App\Http\Controllers\Controller;
use App\Models\Snippet;

class DeleteSnippetController extends Controller
{
    public function __invoke(Snippet $snippet)
    {
        $snippet->delete();

        return response()->noContent();
    }
}
