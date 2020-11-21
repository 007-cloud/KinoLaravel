@extends('layout')

@section('content')
    <h2> {{ $article->title }} </h2>
    <hr>
    <div class="row">
        <div class="well clearfix">
            <div class="col-lg-12 col-md-12">

                <p> {{ $article->body }} </p>
                by: {{ $article->user->name }}
            </div>
        </div>
    </div>
    <div class="row">
        <div id="tags">
            @foreach ($article->tags as $tag)
                <a href="{{ route('articles.index', ['tag' => $tag->name]) }}" class="btn btn-sm">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>
        @can('update', $article)
        <div class="pull-left">
            <form action="{{ route('articles.edit', $article) }}" method="GET">
                @csrf
                <button class="btn btn-success btn-lg">Изменить</button>
            </form>
        </div>
        @endcan

        @can('delete', $article)
        <div class="pull-right">
            <form style="margin-bottom: 2rem" action="{{ route('articles.destroy', $article) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-lg">Удалить</button>
            </form>
        </div>
        @endcan
    </div>

@endsection
