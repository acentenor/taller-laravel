<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    protected $guarded = ['id','update_at','created_at'];

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
}