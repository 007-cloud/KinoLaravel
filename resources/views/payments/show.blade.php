@extends('layout')
@section('content')
    @foreach ($not as $n)
        {{ $n->type }}
        <br>
    @endforeach
@endsection
