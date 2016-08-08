@extends('layouts.template')

@section('content')
<h1>ToDos</h1>
  <div class="table">
    <table class="table">
      <thead>
        <tr>
          <th>
            Nombre
          </th>
          <th>
            Color
          </th>
          <th>
            Status
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($todos as $todo)
        <tr>
          <td>
            <a href="todos/{{ $todo->id }}">
              {{ $todo->name }}
            </a>
          </td>
          <td>
            {{ $todo->colors }}
          </td>
          <td>
            <input type="checkbox" name="name" value="">
            {{ $todo->status }}
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
    </div>
@endsection
