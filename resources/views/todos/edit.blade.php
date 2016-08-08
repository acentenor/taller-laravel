@extends('layouts.template')
@section('content')
  <h1>Edit ToDO {{ $todo->id }}</h1>
  <form class="form-horizontal" action="update" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <fieldset>
      <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $todo->name }}">
      </div>
      <div class="form-group">
        <label for="color">Color: </label>
        <input type="text" name="color" id="color" class="form-control" value="{{ $todo->color }}">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
          <option value="pending">Pending</option>
          <option value="finished">Finished</option>
        </select>
      </div>
      <div class="form-group text-right">
        <input type="submit" value="Edit" class="btn btn-default">
      </div>
    </fieldset>
  </form>
@endsection
