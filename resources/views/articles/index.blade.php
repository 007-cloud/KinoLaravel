@extends('layout')

@section('content')
    <h2>Статьи</h2>
    @can('create', App\Models\Articles::class)
        <form action="{{ route('articles.create') }}" method="GET">
            <button class="btn btn-warning btn-lg pull">Добавить статью</button>
        </form>
    @endcan
    @forelse ($articles as $article)
        <div class="row">
            <div class="well clearfix">
                <p style="color: silver">Автор: {{ $article->user->name }}</p>
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
    <div class="text-center">{{ $articles->links() }}</div>
@endsection
