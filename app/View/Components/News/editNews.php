<?php

namespace App\View\Components\news;

use Illuminate\View\Component;

class editNews extends Component
{
    public $news;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($news)
    {
        $this->news=$news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.news.edit-news');
    }
}
