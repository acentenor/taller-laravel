@extends('layouts.template')
@if(Session::has('message'))
  <div class="alert alert-{{ Session::get('error_color') }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('message') }}
  </div>
@endif

@section('content')
<h1>ToDos</h1>
<div class="text-right">
  <a href="todos/create">
    <button type="button" name="button" class="btn btn-success">
      <i class="glyphicon glyphicon-plus"></i> Create New ToDo
    </button>
  </a>
</div>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>
            Name
          </th>
          <th>
            Color
          </th>
          <th>
            Status
          </th>
          <th>
            User
          </th>
          <th>
            Edit
          </th>
          <th>
            Delete
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
            {{ $todo->color }}
          </td>
          <td>
            {{ $todo->status }}
          </td>
          <td>
            @if(isset($todo->user))
              {{ $todo->user->name }}
            @endif
          </td>
          <td class="text-center">
            <a href="todos/{{ $todo->id }}/edit">
              <button class="btn btn btn-warning btn-large-active" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
            </a>
          </td>
          <td class="text-center">
            {!! Form::open(['url' => ['todos/destroy',$todo], 'method' => 'delete', 'class' => 'form-delete', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
              <button class="btn btn btn-danger btn-large-active" type="submit" onclick ='return confirmar()'><i class="glyphicon glyphicon-remove"></i></button>
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
    </div>

@endsection
