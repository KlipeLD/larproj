<?php

namespace App\Http\Controllers;

//use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Articles;
use App\Models\Comments;

class PostsController extends Controller
{
    public function show($post)
    {
        $post1 = Articles::where('id', $post)
            ->orWhere('slug', $post)
           ->firstOrFail();

        $articles = \App\Models\Comments::latest()
            ->where('articles_id', $post1->id)
            ->orderBy('created_at')
            ->simplePaginate(200);
        // $articles = \App\Models\Articles::latest()->get()->paginate(6);
        $postId = $post1->id;
        $post2 = Articles::findOrFail($postId);
        event('postHasViewed', $post2);

        //$article = Articles::findorFail($post);
        return view('articles.show',[
            'article' =>$post1,
            'comments' =>$articles
        ]);
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

    public function indexMain()
    {
        $articles = \App\Models\Articles::latest()
             ->Limit(6)
             ->get();

        return view('welcome',['articles' =>$articles]);
       // return dd($articles);
    }

    public function clickLike($post)
    {
        $article = Articles::findorfail($post); // Find our post by ID.
        $article->increment('likes'); // Increment the value in the clicks column.
        $article->update(); // Save our updated post.
        return redirect()->back();
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
