<?php

use Illuminate\Database\Seeder;

class AgentAndBlogImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\agent_and_blog_image::class, 30)->create();
    }
}
