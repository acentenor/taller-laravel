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

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function projects ()
    {
      return $this->belongsToMany('App\Project','todos_project')->withPivot('tag');
    }

   public function scopeColor($query,$color){
     return $query->where('color',$color);
   }

   public function scopePending($query)
   {
     return $query->where('status','pending')->orderBy('created_at');
   }

   public function scopeFinished($query)
   {
     return $query->where('status','finished')->orderBy('updated_at');
   }

   public function getStatusAttribute($value)
   {
     return ucfirst($value);
   }
}
