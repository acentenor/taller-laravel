<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','todo_id'];

    public function todo()
    {
        return $this->belongsTo('App\Todo');
    }
}
