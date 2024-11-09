<?php

namespace App\View\Components;

use App\Models\Snippet as SnippetModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Tempest\Highlight\Highlighter;

class Snippet extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public SnippetModel $snippet) {}

    public function getCode()
    {
        $highlighter = new Highlighter();

        $code = $highlighter->parse($this->snippet->code, $this->snippet->language);

        return $code;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.snippet');
    }
}
