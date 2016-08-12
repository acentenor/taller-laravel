<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
      DB::table('comments')->insert([
        'comment' => 'Primer Comentario, puedes borrarme si quieres',
        'todo_id' => 1,
        'user_id' => 1,
      ]);
      */
      factory(App\Comment::class,5)->create();
    }
}
