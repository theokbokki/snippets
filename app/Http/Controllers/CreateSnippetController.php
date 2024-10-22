<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateSnippetController extends Controller
{
    public function __invoke()
    {
        return view('pages.snippet.create');
    }
}
