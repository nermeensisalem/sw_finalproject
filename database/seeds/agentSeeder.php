<?php

use Illuminate\Database\Seeder;

class agentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Agent::class, 30)->create();
    }
}
