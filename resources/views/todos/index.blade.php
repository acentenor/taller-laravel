@extends('layouts.template')
@if(Session::has('message'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('message') }}
  </div>
@endif
@section('content')
<h1>ToDos</h1>
<div class="text-right">
  <a href="todos/create">
    <button type="button" name="button" class="btn btn-success">
      Create New ToDo
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
            <a href="todos/{{ $todo->id }}/edit">
              <div class="alert alert-warning text-center">
                <i class="glyphicon glyphicon-pencil"></i>
              </div>
            </a>
          </td>
          <td>
            {{-- <form method="POST" action="todos/destroy/{{$todo->id}}" onsubmit="return confirm(&quot;Are you sure?&quot;)">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
							<input class="btn btn-danger" onclick="return confirmar()" type="submit" value="Delete">
            </form> --}}
            {!! Form::open(['url' => ['todos/destroy',$todo], 'method' => 'delete', 'class' => 'form-delete', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-large-active', 'onclick' => 'return confirmar()']) !!}
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
    </div>

@endsection
