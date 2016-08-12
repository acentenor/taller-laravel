<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','user_id'];

    public function todos()
    {
        return $this->belongsToMany('App\Todo','todos_project')->withPivot('tag');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
