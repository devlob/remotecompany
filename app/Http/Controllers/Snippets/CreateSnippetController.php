<?php

namespace App\Http\Controllers\Snippets;

use App\Http\Controllers\Controller;
use App\Models\Snippet;
use Illuminate\Http\Request;

class CreateSnippetController extends Controller
{
    public function __invoke(Request $request)
    {
        $snippet = Snippet::create([
            'title' => $request->title,
            'description' => $request->description,
            'html' => $request->html,
        ]);

        return response()->json([
            'data' => $snippet
        ], 201);
    }
}
