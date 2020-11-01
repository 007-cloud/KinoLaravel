@extends('layout')

@section('content')
    <form role="search" class="visible-xs">
        <div class="form-group">
            <div class="input-group">
                <input type="search" class="form-control input-lg" placeholder="Ваш запрос"/>
                <div class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <h1>Контакты</h1>
    <hr>
    <p>Отправьте ваш отзыв о портале</p>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        @guest
        @if (session('message'))
            <div class="text-success" style="text-align: center">
                <h2>{{ session('message') }}</h2>
            </div>
        @endif

            @if (Route::has('register'))
                <div class="form-group">
                    <input type="text" placeholder="Ваше имя" class="form-control input-lg" name="name" required>
                    @error('name')
                        <div class="text-small alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="email" placeholder="Ваше email" class="form-control input-lg" id="input_second" name="email" required>
                    @error('email')
                        <div class="text-small alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" required></textarea>
                    @error('message')
                        <div class="text-small alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-lg btn-warning pull-right">Отправить</button>
            @endif
            @else
            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
            <div class="form-group">
                <textarea class="form-control" name="message" required></textarea>
                @error('message')
                    <div class="text-small alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-lg btn-warning pull-right">Отправить</button>

        @endguest
    </form>
@endsection
