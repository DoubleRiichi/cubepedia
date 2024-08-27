<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;
use App\Models\Comment;

class commentc extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public User $user,
        public Comment $comment,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.commentc');
    }
}
