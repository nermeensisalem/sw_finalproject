<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images_property extends Model
{
    protected $fillable=['path','property_id'];
    //عشان اعرف الصورة تابعة لاي property

    public function property(){
        return $this->$this->belongsTo('App/Property');
}
}
