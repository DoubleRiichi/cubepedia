<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\URL;

class sidebarc extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $current_url = parse_url(URL::current(), PHP_URL_PATH);
        $current_url = str_replace("%20", " ", substr($current_url, 1)); # shhhhh
        $current_url = explode("/", $current_url);
        return view('components.sidebarc', compact("current_url"));
    }
}
