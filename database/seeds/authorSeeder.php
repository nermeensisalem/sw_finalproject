<?php

use Illuminate\Database\Seeder;

class authorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Author::class, 30)->create();
    }
}
