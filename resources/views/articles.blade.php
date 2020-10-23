@extends('layout')

@section('content')   
    <h2>Статьи</h2>
    <a href="/articles/create" class="btn btn-warning btn-lg pull">Добавить статью</a>
    <hr>

    @forelse ($articles as $article)
        <div class="row">
            <div class="well clearfix">
                <div class="text-center">
                    <h3>{{ $article->title }}</h3>
                    <p>{{ $article->excerpt }}</p>
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