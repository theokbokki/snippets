<?php

namespace App\Http\Controllers;

class CreateSnippetController extends Controller
{
    public function __invoke()
    {
        return view('pages.snippet.create');
    }
}
