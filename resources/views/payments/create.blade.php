@extends('layout')

@section('content')
    <form action="{{ route('payments.store') }} " method="POST">
        @csrf
        <button class="btn btn-primary btn-lg">Payment</button>
    </form>
@endsection
