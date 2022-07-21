<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Http\Requests\Links\CreateLinkRequest;
use App\Models\Link;

class CreateLinkController extends Controller
{
    public function __invoke(CreateLinkRequest $request)
    {
        $link = Link::create($request->validated());

        return response()->json([
            'data' => $link
        ], 201);
    }
}
