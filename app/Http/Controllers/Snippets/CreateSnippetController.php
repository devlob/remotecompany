<?php

namespace App\Http\Controllers\Snippets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Snippets\CreateSnippetRequest;
use App\Models\Snippet;

class CreateSnippetController extends Controller
{
    public function __invoke(CreateSnippetRequest $request)
    {
        $snippet = Snippet::create($request->validated());

        return response()->json([
            'data' => $snippet
        ], 201);
    }
}
