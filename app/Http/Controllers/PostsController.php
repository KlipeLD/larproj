<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Articles;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = Articles::where('slug', $slug)->firstorFail();

        return view('post',[
            'post' => $post
        ]);
    }
}
