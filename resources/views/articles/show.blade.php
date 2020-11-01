@extends('layout')

@section('content')
    <h2> {{ $article->title }} </h2>
    @guest
        @if (Route::has('register'))
        @endif
        @else
            @if (Auth::user()->id == $article->user_id)
                <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-lg">Изменить</a>
            @endif
        <hr>
    @endguest


    <hr>
    <div class="row">
        <div class="well clearfix">
            <div class="col-lg-12 col-md-12">

                <p> {{ $article->body }} </p>
                by: {{ $user->name }}
            </div>
        </div>
    </div>

    <div id="tags">
        @foreach ($article->tags as $tag)
            <a href="{{ route('articles.index', ['tag' => $tag->name]) }}" class="btn btn-sm">
                #{{ $tag->name }}
            </a>
        @endforeach

    </div>

@endsection
