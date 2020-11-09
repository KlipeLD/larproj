<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $item = DB::table('main_menu')->get();
    $name = request('name');
    return view('welcome',compact('item'));
});

Route::get('articles', function () {
    return view('articles');
});

Route::get('/articles/{post}', 'App\Http\Controllers\PostsController@show');

Route::get('about', function () {
    return view('about', [
        'articles' => App\Models\Articles::take(3)->latest()->get()
    ]);
});
