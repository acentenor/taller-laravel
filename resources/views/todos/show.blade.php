@extends('layouts.template')

@section('content')
    <h1>This is number {{ $todo->id }} toDo</h1>
    <p>
      <h2>toDo Data</h2>
      Name: {{ $todo->name }} <br>
      Asigned Color: {{ $todo->color }} <br>
      Status: {{ $todo->status }} <br>
      Projects: @foreach($todo->projects as $project)
        {{ $project->name }},
      @endforeach
      <br>

      <br>
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
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
          <br>
          @if(Auth::user()->id == $comment->user_id)
            <a href="comments/{{ $comment->id }}/edit" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>

            {!! Form::open(['url' => ['comments/destroy',$comment], 'method' => 'delete', 'class' => 'form-delete', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
              <button class="glyphicon glyphicon-remove" type="submit" onclick ='return confirmar()'></button>
            {!! Form::close() !!}
          @endif


        </li>
      </ul>


      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Edit comment </h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="message-text" class="control-label">Comment:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Edit</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach
@endsection
