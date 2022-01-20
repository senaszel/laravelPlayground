<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\News\UpdateNewsControllerRequest;
use App\Http\Requests\News\StoreNewsControllerRequest;

class NewsController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('news.add-new-news');
    }

    public function store(StoreNewsControllerRequest $request)
    {
        $news = News::create($request->validated());
        return redirect('news/' . $news->id);
    }

    public function show(News $news)
    {
        return view('news.show-news', compact('news', $news));
    }

    public function edit(News $news)
    {
        return view('news.edit-news')->with('news', $news);
    }

    public function update(UpdateNewsControllerRequest $request, News $news)
    {
        $author = $request->author ?? Auth::user()->username;
        $publisher_id = Auth::user()->id;

        $news->update(array_merge($request->validated(), array_combine(array('author', 'publisher_id'), array($author, $publisher_id))));

        return redirect()->route('show-news', $news);
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('home');
    }
}
