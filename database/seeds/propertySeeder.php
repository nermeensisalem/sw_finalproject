<?php

use Illuminate\Database\Seeder;

class propertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Property::class, 100)->create();
    }
}
