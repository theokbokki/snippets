<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSnippetRequest;
use App\Models\Snippet;

class StoreSnippetController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreSnippetRequest $request)
    {
        $snippet = Snippet::query()->create($request->except(['_token']));

        return redirect()->intended(route('snippet.show', compact('snippet')));
    }
}
