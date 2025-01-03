<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $search = $request->input('search');

        $query = empty($search)
            ? Snippet::query()
            : Snippet::handleFilterSearch($search);

        session()->flash('search_results', $query->get());
        session()->flash('search', $request->input('search'));

        return redirect()->route('home');
    }
}
