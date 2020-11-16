@extends ('layout')
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" rel="stylesheet"/>
@endsection
@section ('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <H1 class="heading has-text-weight-bold is-size-4">{{$article->title}}</h1>
                    <span class="heading is-size-14">{{$article->short_body}}</span>
                </div>
                <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                <p>{{$article->body}}</p>

                <p>
                    @foreach ($article->tags as $tag)
                        <a href="{{route('articles.index',['tag'=>$tag->name])}}">{{$tag->name}}</a>
                    @endforeach
                </p>
            </div>

        </div>
    </div>
    @include('comments.create')
    @include('comments.index')

@endsection
