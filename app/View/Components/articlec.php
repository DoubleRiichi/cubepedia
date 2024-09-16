<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Article;
use App\Models\Image;

class articlec extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Article $article,
        public $summary,
        public Image $image
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.articlec');
    }
}
