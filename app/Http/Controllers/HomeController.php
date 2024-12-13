<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {

        $snippets = session('search_results', Snippet::all());

        return view('pages.index', compact('snippets'));
    }
}
