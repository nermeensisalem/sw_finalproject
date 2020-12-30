<?php

use Illuminate\Database\Seeder;

class AmenityPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=8; $i++){
            \Illuminate\Support\Facades\DB::table("amenity_properties")->insert([
                'amenity_id'=>\App\Amenities::all()->random()->id,
                'property_id'=>\App\Property::all()->random()->id,


            ]);
        }
    }
}
