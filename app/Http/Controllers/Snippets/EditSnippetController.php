<?php

namespace App\Http\Controllers\Snippets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Snippets\EditSnippetRequest;
use App\Models\Snippet;

class EditSnippetController extends Controller
{
    public function __invoke(EditSnippetRequest $request, Snippet $snippet)
    {
        $snippet->update($request->validated());

        return response()->json([
            'data' => $snippet
        ]);
    }
}
