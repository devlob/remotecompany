<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class EditLinkController extends Controller
{
    public function __invoke(Link $link, Request $request)
    {
        $link->update([
            'title' => $request->title,
            'link' => $request->link,
            'open_in_new_tab' => $request->open_in_new_tab,
        ]);

        return response()->json([
            'data' => $link
        ]);
    }
}
