@extends('layout')

@section('content')
    <h2>Статьи</h2>
    @guest
        @if (Route::has('register'))
        @endif
        @else
            <a href="/articles/create" class="btn btn-warning btn-lg pull">Добавить статью</a>
        <hr>
    @endguest
    @forelse ($articles as $article)
        <div class="row">
            <div class="well clearfix">
            @foreach ($users as $user)
                @if ($article->user_id === $user->id)
                    <p style="color: silver">Author: {{ $user->name }}</p>
                @endif
            @endforeach
                <div class="text-center">
                    <h3>{{ $article->title }}</h3>
                    <p>{{ $article->excerpt }}</p>
                    @foreach ($article->tags as $tag)
                        <a href="{{ route('articles.index', ['tag' => $tag->name]) }}" class="btn btn-sm">
                            #{{ $tag->name }}
                        </a>


                @endforeach
                </div>
                <div class="col-lg-12">
                    <a href="/articles/{{ $article->id }}" class="btn btn-lg btn-warning pull-right">Подробнее</a>
                </div>
            </div>
        </div>
    @empty
        <div class="row">
                <div class="text-center">
                    <h3>SORRY!!!</h3>
                    <p>There is no articles with this tag :(</p>
                </div>
        </div>
    @endforelse
@endsection
