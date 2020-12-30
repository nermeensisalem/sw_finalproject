<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded=[];

    public function blogs(){
        return $this->belongsToMany('App\Blog');
    }
}
