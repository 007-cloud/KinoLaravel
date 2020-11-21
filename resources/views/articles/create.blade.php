@extends('layout')

@section('content')

<form method="POST", action="{{ route('articles.store') }}">
    @csrf

    <div class="form-group">
      <label for="title">Загаловок</label>
      <input type="text" class="form-control" name="title" placeholder="Загаловок" value="{{ old('title') }}" required>
      @error('title')
        <p class="help alert-danger">{{ $errors->first('title') }}</p>
      @enderror
    </div>
    <div class="form-group">
      <label for="excerpt">Отрывок</label>
      <textarea class="form-control" name="excerpt" placeholder="Отрывок" rows="3" required>{{ old('excerpt') }}</textarea>
      @error('excerpt')
        <p class="help alert-danger">{{ $errors->first('excerpt') }}</p>
      @enderror
    </div>
    <div class="form-group">
        <label for="body" place>Текст</label>
    <textarea class="form-control" name="body" placeholder="Текст" rows="9" required>{{ old('body') }}</textarea>
        @error('body')
          <p class="help alert-danger">{{ $errors->first('body') }}</p>
        @enderror
      </div>
      <div class="form-group">
        <select class="form-control" name="tags[]" multiple>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>

    </div>
    <button type="submit" class="btn btn-warning btn-lg">Добавить</button>
  </form>

@endsection

