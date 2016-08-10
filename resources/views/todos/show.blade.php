@extends('layouts.template')

@section('content')
    <h1>This is number {{ $todo->id }} toDo</h1>
    <p>
      <h2>toDo Data</h2>
      Name: {{ $todo->name }} <br>
      Asigned Color: {{ $todo->color }} <br>
      Status: {{ $todo->status }} <br>
      User: @if(isset($todo->user))
        {{ $todo->user->name }}
      @endif
    </p>
    <h2>Comments</h2>
    <a class="btn btn-success" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Add Comment
    </a>
    <div class="collapse" id="collapseExample">
      <div class="well">
        {!! Form::open(['route' => 'comments.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        <div class="form-group form-group-lg">
          {!! Form::hidden('todo_id',$todo->id)!!}
            {!! Form::label('comment','Write a Comment: ', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-md-10 col-md-offset-2">
              {!! Form::textarea('comment',null,['class' => 'form-control','rows' => '3']) !!}
          </div>
        </div>
        <div class="form-group form-group-lg text-right">
            <div class="col-md-10 col-md-offset-2">
              {!! Form::submit('Add',['class' => 'btn btn-primary btn-lg active']) !!}
            </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
    @foreach($todo->comments as $comment)
      <ul>
        <li>
          {{ $comment->comment }}
        </li>
      </ul>
    @endforeach
@endsection
