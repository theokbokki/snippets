<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use Illuminate\Http\Request;

class RestoreSnippetController extends Controller
{
    public function __invoke(Request $request, Snippet $snippet)
    {
        $snippet->restore();

        return back();
    }
}
