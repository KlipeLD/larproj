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

Route::get('/articles', 'App\Http\Controllers\PostsController@index')->name('articles.index');;
Route::post('/articles', 'App\Http\Controllers\PostsController@store');
Route::get('/articles/create', 'App\Http\Controllers\PostsController@create');
Route::get('/articles/{post}', 'App\Http\Controllers\PostsController@show')->name('articles.show');
Route::get('/articles/{post}/edit', 'App\Http\Controllers\PostsController@edit');
Route::put('/articles/{post}', 'App\Http\Controllers\PostsController@update');



Route::get('about', function () {
    return view('about', [
        'articles' => App\Models\Articles::take(3)->latest()->get()
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
