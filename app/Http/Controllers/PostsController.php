<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Articles;

class PostsController extends Controller
{
    public function show($post)
    {
        $post1 = Articles::where('id', $post)
            ->orWhere('slug', $post)
           ->firstOrFail();
        //$article = Articles::findorFail($post);
        //$post = Articles::where('slug', $post)->first();
        //return view('articles.show')->with('article', $post1);
        //return view('articles.show',['article'=>$post1]);
        return view('articles.show',['article' =>$post1]);
    }

    public function index()
    {
        if(request('tag'))
        {
            $articles = \App\Models\Tags::where('name', request('tag'))->firstOrFail()->articles;
        }
        else
        {
            $articles = \App\Models\Articles::latest()
                ->orderBy('created_at')
                ->simplePaginate(6);
           // $articles = \App\Models\Articles::latest()->get()->paginate(6);
        }
        return view('articles.index',['articles' =>$articles]);
    }

    public function create()
    {
        $tags = \App\Models\Tags::all();

        return view('articles.create',['tags'=>\App\Models\Tags::all()]);
    }

    public function store()
    {
        //$slug = Str::slug($name);
        $this->validateArticles();
        $article =  new Articles(request(['title', 'short_body', 'body']));
        $article->user_id = 1;
        $article->slug = str_slug(request('title'));
        $article->save();
        $article->tags()->attach(request('tags'));
       return redirect(route('articles.index'));
    }

    public function edit(Articles $post)
    {
        //$article = Articles::findorFail($articleId);
        return view('articles.edit',['article' =>$post]);
    }

    public function update(Articles $post)
    {
        $post->update($this->validateArticles());

        return redirect($post->path());
    }

    public function destroy()
    {
        $articles = Articles::latest()->get();
        return view('articles.index',['articles' =>$articles]);
    }

    protected function validateArticles()
    {
        request()->validate([
            'title'=> ['required','min:3','max:255'],
            'short_body' => ['required'],
            'body' => ['required'],
            'tags' => 'exists:tags,id'
        ]);
    }
}
