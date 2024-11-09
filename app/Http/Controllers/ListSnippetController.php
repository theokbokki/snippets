<?php

namespace App\Http\Controllers;

use App\Models\Snippet;

class ListSnippetController extends Controller
{
    public function __invoke()
    {
        return view('pages.snippet.list', [
            'snippets' => Snippet::withTrashed()->get(),
        ]);
    }
}
