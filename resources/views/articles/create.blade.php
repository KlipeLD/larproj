@extends('layout')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" rel="stylesheet"/>
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <H1 class="heading has-text-weight-bold is-size-4">New Article</H1>
            <form method="post" action="/articles">
                @csrf
                <div class="field">
                    <label class="label" for="title">Title</label>
                </div>
                <div class="control">
                    <input class="input" type="text" name="title" id="title">
                </div>
                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>
                </div>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt"></textarea>
                </div>
                <div class="field">
                    <label class="label" for="body">Body</label>
                </div>
                <div class="control">
                    <textarea class="textarea" name="body" id="body"></textarea>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
