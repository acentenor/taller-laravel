<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos_project', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('todo_id')->unsigned()->index();
            $table->integer('project_id')->unsigned()->index();
            $table->string('tag');
            $table->foreign('todo_id')->references('id')->on('todos');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('todos_project');
    }
}
