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
       // $post = Articles::where('slug', $slug)->firstorFail();

        //return view('post',[
        //    'post' => $post
        //]);
        return view('articles.show',['article' =>$article]);
    }

    public function index()
    {
        $articles = Articles::latest()->get();
        return view('articles.index',['articles' =>$articles]);
    }
}
