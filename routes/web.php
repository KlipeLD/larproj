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
    return view('welcome',compact('item'));
});

Route::get('articles', function () {
    return view('articles');
});

Route::get('articles/{{slug}}', function ($id) {
    $slug = DB::table('articles')->find($id);
    dd($slug);
    return view('articles',compact('slug'));
});
