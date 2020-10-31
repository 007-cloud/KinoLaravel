@extends('layout')

@section('content')
<form method="POST", action="{{ route('articles.update', $article) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Загаловок</label>
        <input type="text" class="form-control @error('title') is-danger @enderror" name="title" placeholder="Загаловок" value="{{ $article->title }}" required>
        @error('title')
            <p class="help is-danger">{{ $errors->first('title') }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="excerpt">Отрывок</label>
        <textarea class="form-control @error('title') is-danger @enderror" name="excerpt" placeholder="Отрывок" rows="2" required>{{ $article->excerpt }}</textarea>
        @error('title')
            <p class="help is-danger">{{ $errors->first('title') }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="body" place>Текст</label>
        <textarea class="form-control @error('title') is-danger @enderror" name="body" placeholder="Текст" rows="5" required>{{ $article->body }}</textarea>
        @error('title')
            <p class="help is-danger">{{ $errors->first('title') }}</p>
        @enderror
    </div>
    <div class="form-group">
        <select class="form-control" name="tags[]" multiple>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}"
                    @foreach ($tag->articles as $art)
                        @if($art->id == $article->id)
                            selected

                        @endif
                        @break
                    @endforeach
                >{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-warning btn-lg">Изменить</button>
  </form>
@endsection

