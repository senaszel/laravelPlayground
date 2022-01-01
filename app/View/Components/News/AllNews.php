<?php

namespace App\View\Components\News;

use App\Models\News;
use Illuminate\View\Component;

class AllNews extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $allnews = News::get();
        return view('components.news.all-news', [
            'allnews' => $allnews,
        ]);
    }

}
