<?php

namespace App\Http\Controllers\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;

class DeleteLinkController extends Controller
{
    public function __invoke(Link $link)
    {
        $link->delete();

        return response()->noContent();
    }
}
