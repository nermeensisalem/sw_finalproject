<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class property_type extends Model
{
    public function properties(){
        return $this->hasMany('App\Property');
    }
}
