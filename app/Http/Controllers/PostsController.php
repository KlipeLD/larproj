<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Articles;

class PostsController extends Controller
{
    public function show($articleId)
    {
        $article = Articles::find($articleId);
        return view('articles.show',['article' =>$article]);
    }

    public function index()
    {
        $articles = Articles::latest()->get();
        return view('articles.index',['articles' =>$articles]);
    }

    public function create()
    {
        //$articles = Articles::latest()->get();
        return view('articles.create');
    }

    public function store()
    {
       $article = new Articles();
       $article->title = request('title');
       $article->slug = request('title');
       $article->user_id = '1';
       $article->short_body = request('excerpt');
       $article->body = request('body');
       $article->save();

       return redirect('/articles');
    }

    public function edit($articleId)
    {
        $article = Articles::find($articleId);
        return view('articles.edit',['article' =>$article]);
    }

    public function update($articleId)
    {
        $article = Articles::find($articleId);
        $article->title = request('title');
        $article->slug = request('title');
        $article->user_id = '1';
        $article->short_body = request('excerpt');
        $article->body = request('body');
        $article->save();
        return redirect('/articles/'. $article->id);
    }

    public function destroy()
    {
        $articles = Articles::latest()->get();
        return view('articles.index',['articles' =>$articles]);
    }
}
