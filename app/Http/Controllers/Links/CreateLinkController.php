<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class CreateLinkController extends Controller
{
    public function __invoke(Request $request)
    {
        $link = Link::create([
            'title' => $request->title,
            'link' => $request->link,
            'open_in_new_tab' => $request->open_in_new_tab,
        ]);

        return response()->json([
            'data' => $link
        ], 201);
    }
}
