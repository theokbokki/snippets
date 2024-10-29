<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use Illuminate\Http\Request;

class ShowSnippetController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Snippet $snippet)
    {
        return view('pages.snippet.index', compact('snippet'));
    }
}
