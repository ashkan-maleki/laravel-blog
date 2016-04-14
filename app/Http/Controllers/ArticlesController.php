<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
	}


    public function show(Article $article)
    {
//        $article = Article::findOrFail($id);
//        dd($article->published_at->diffForHumans());
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', compact('tags'));
    }

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        $article =  Auth::user()->articles()->create($request->all());
        // dd($request->input('tags'));

        $article->tags()->attach($request->input('tags'));

        flash()->success('Your article has been created.', 'good job');

        return redirect('articles');
    }

    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $article->tags()->sync($request->input('tags'));

        return redirect('articles');
    }

}
