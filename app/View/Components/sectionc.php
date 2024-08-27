<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Section;
use App\Models\Image;

class sectionc extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Section $section,
        public $images,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sectionc');
    }
}
