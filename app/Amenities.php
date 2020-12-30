<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    protected $guarded=[];

    public function properties(){
        return $this->belongsToMany('App\Property','amenity_properties','amenity_id',
            'property_id');
    }
}
