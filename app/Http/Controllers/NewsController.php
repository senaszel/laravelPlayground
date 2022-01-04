<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.add-new-news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:150'],
            'description' => ['required', 'max:150'],
            'content' => ['required', 'max:2000'],
        ]);

        $newNews = News::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request['content'],
            'author' => $request->author ?? Auth::user()->username,
            'publisher_id' => Auth::user()->id,
        ]);

        return redirect('news/' . $newNews->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show-news', compact('news', $news));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit-news')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => ['required', 'max:150'],
            'description' => ['required', 'max:150'],
            'content' => ['required', 'max:2000'],
        ]);
        $request['author'] = $request->author ?? Auth::user()->username;
        $request['publisher_id'] = Auth::user()->id;

        $news->update($request->all());

        return redirect()->route('show-news',$news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect('');
    }
}
