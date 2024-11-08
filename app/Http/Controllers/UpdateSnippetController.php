<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSnippetRequest;
use App\Models\Snippet;
use Illuminate\Http\Request;

class UpdateSnippetController extends Controller
{
    public function __invoke(StoreSnippetRequest $request, Snippet $snippet)
    {
        $snippet = Snippet::query()
            ->find($snippet->id);

        if (!$snippet) {
            return redirect(route('snippet.create'));
        }

        $snippet->update($request->except(['_token']));

        return redirect()->intended(route('snippet.show', compact('snippet')));
    }
}
