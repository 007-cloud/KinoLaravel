@extends('layout')

@section('content')

    <table class="table">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $u)
                <tr>
                    <th scope="row">{{ $u->id }}</th>
                    <td>{{ $u->name }}</td>
                    <form method="POST" action="">
                        @method('DELETE')
                        @csrf
                        <td><button class="btn btn-danger">Delete</button></td>
                    </form>
                <tr>
            @endforeach
          </tbody>
    </table>

@endsection
