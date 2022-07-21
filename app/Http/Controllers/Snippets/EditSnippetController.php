<?php

namespace App\Http\Controllers\Snippets;

use App\Http\Controllers\Controller;
use App\Models\Snippet;
use Illuminate\Http\Request;

class EditSnippetController extends Controller
{
    public function __invoke(Snippet $snippet, Request $request)
    {
        $snippet->update([
            'title' => $request->title,
            'description' => $request->description,
            'html' => $request->html,
        ]);

        return response()->json([
            'data' => $snippet
        ]);
    }
}
