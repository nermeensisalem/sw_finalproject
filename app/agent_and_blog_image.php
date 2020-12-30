<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agent_and_blog_image extends Model
{
    protected $fillable= ['path'];
    public function imageable(){
        return $this->morphTo();
    }
}
