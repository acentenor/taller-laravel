@extends('layouts.template')
@if(Session::has('message'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('message') }}
  </div>
@endif
@section('content')
  <h1>Create new toDo</h1>
  <form class="form-horizontal" action="store" method="post">
    {{ csrf_field() }}
    <fieldset>
      <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="color">Color: </label>
        <input type="text" name="color" id="color" class="form-control">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
          <option value="pending">Pending</option>
        </select>
      </div>
      <div class="form-group text-right">
        <input type="submit" value="Create" class="btn btn-default">
      </div>
    </fieldset>
  </form>
@endsection
