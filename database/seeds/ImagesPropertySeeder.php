<?php

use Illuminate\Database\Seeder;

class ImagesPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\images_property::class, 30)->create();

    }
}
