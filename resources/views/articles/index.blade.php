@extends ('layout')

@section ('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div id="sidebar2">
                    <ul class="style1">
                        @forelse($articles as $article)
                            <li class="first">
                                <h3>
                                    <a href="{{$article->path()}}">{{$article->slug}}</a>
                                </h3>
                                <p><img src="images/banner.jpg" alt="" class="image image-full" /> </p>
                                <p><a href="/articles/{{$article->id}}">{{$article->short_body}}.</a></p>
                            </li>
                        @empty
                            <p>No relevant articles yet</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
