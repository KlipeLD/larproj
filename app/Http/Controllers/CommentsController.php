<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Comments;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class CommentsController extends Controller
{
    public function store($post)
    {
        try
        {
            $this->validateComments();
            $post1 = Articles::where('id', $post)
                ->orWhere('slug', $post)
                ->firstOrFail();

            $postId = $post1->id;
            $comment =  new Comments(request(['subject', 'body']));
            sleep(10);
            $comment->articles_id = $postId;
            $comment->save();
        }
        catch (ModelNotFoundException $exception)
        {
            return store($post);
        }
        return redirect()->back();
        //return redirect(route('articles.show',['post' => $post]));
    }

    protected function validateComments()
    {
        request()->validate([
            'subject'=> ['required'],
            'body' => ['required']
        ]);
    }
}
