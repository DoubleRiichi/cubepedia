<?php

namespace App\Http\Controllers;

use App\Services\MarkdownService;

abstract class Controller
{
    protected $markdownService;

    public function __construct(MarkdownService $markdownService)
    {
        $this->markdownService = $markdownService;
    }
}
