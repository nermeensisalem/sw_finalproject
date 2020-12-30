<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $guarded=[];
    public function properties(){
        return $this->hasMany('App\Property');
    }
    public function agent_image(){
        return $this->morphOne('App\agent_and_blog_image','imageable');
    }



}
