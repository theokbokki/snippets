<?php

namespace App\Http\Controllers;

use App\Models\Snippet;

class EditSnippetController extends Controller
{
    public function __invoke(Snippet $snippet) {
        return view('pages.snippet.edit', compact('snippet'));
    }
}
