<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded=[];

    public function agent(){
        return $this->belongsTo('App\Agent');
    }

    public function property_images(){
        return $this->hasMany('App\images_property');
    }

    public function type(){
        return $this->belongsTo('App\property_type');
    }

    public function amenities(){
        return $this->belongsToMany('App\Amenities','amenity_properties','property_id','amenity_id');
    }
}
