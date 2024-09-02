<?php

namespace App\View\Components;

use App\Models\Article;
use App\Models\Image;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class articlepillc extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $articles,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.articlepillc');
    }
}
