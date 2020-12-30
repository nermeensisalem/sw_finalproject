<?php

namespace App;

use Illuminate\Database\Eloquent\Model;use Illuminate\Support\Facades\App;

class Blog extends Model
{
    protected $fillable=['title','body','image','category_id','author_id','date'];
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function author(){
        return $this->belongsTo('App\Author');
    }
    public function blog_image(){
        return $this->morphOne('App\agent_and_blog_image','imageable');
    }

}
