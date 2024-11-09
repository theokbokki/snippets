<?php

namespace App\Http\Controllers;

use App\Models\Snippet;

class ShowSnippetController extends Controller
{
    public function __invoke(Snippet $snippet)
    {
        return view('pages.snippet.index', compact('snippet'));
    }
}
