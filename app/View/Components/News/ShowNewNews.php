<?php

namespace App\View\Components\News;

use App\Models\News;
use App\Models\User;
use Illuminate\View\Component;

class ShowNewNews extends Component
{
    public $news;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($news)
    {
        $this->news = $news;
    }

    public function title() {
        return $this->news->title;
    }
    public function desc() {
        return $this->news->description;
    }
    public  function content() {
        return $this->news->content;
    }
    public function author() {
        return $this->news->author ?? User::find($this->news->publisher_id)->get('username');
    }
    public function publisher() {
        return User::find($this->news->publisher_id)->username;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     * @throws \Exception
     */
    public function render()
    {
        return view(
            'components.news.show-new-news'
        );
    }
}
