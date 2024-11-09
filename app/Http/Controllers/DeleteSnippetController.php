<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use Illuminate\Http\Request;

class DeleteSnippetController extends Controller
{
    public function __invoke(Snippet $snippet)
    {
        $snippet->delete();

        return back();
    }
}
