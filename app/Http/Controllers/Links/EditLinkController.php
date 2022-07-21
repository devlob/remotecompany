<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Http\Requests\Links\EditLinkRequest;
use App\Models\Link;

class EditLinkController extends Controller
{
    public function __invoke(EditLinkRequest $request, Link $link)
    {
        $link->update($request->validated());

        return response()->json([
            'data' => $link
        ]);
    }
}
