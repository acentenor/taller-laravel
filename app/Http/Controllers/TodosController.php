<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TodoRequest;
use App\Http\Controllers\Controller;
use App\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        $todos->load('user');
        return view('todos.index')->withTodos($todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        Todo::create(request()->all());
        //return back()->with('message','ToDo was created successfully');
        session()->flash('error_color','success');
        session()->flash('message','ToDo was created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $id)
    {
        $id->load('user');
        return view('todos.show')->withTodo($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $id)
    {
        return view('todos.edit')->withTodo($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $id)
    {
      $id->fill($request->all());
      $id->save();
      return redirect('/')->with('message','ToDo was edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // dd($id);
      try {
       $todo = Todo::findOrFail($id->id);
     } catch(ModelNotFoundException $e){
         return redirect('/')->with('message','Please try again');
     }
        $todo->delete();
        return back();
     }
}
