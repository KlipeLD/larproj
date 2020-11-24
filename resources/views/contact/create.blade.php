@extends('layout')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" rel="stylesheet"/>
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <H1 class="heading has-text-weight-bold is-size-4">Новое обращение</H1>
            <form method="post" action="/contact">
                @csrf
                <div class="field">
                    <label class="label" for="name">Имя</label>
                </div>
                <div class="control">
                    <input class="input @error('name') is-danger @enderror "
                           type="text" name="name" id="name" value="{{old('name')}}">
                    @error('name')
                    <p class="help is-danger">{{$errors->first('name')}}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label" for="tel">Телефон</label>
                </div>
                <div class="control">
                    <input class="input @error('tel') is-danger @enderror "
                           type="text" name="tel" id="tel" value="{{old('tel')}}">
                    @error('tel')
                    <p class="help is-danger">{{$errors->first('tel')}}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label" for="body">Обращение</label>
                </div>
                <div class="control">
                    <textarea class="textarea  @error('body') is-danger @enderror"
                              name="body" id="body">{{old('body')}}</textarea>
                    @error('body')
                    <p class="help is-danger">{{$errors->first('body')}}</p>
                    @enderror
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
