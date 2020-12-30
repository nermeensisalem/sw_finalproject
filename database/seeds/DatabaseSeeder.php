<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(agentSeeder::class);
        $this->call(authorSeeder::class);
        $this->call(categorySeeder::class);
        $this->call(PropertyTypeSeeder::class);
        $this->call(AmenitiesSeeder::class);
        $this->call(blogSeeder::class);
        $this->call(commentSeeder::class);
        $this->call(propertySeeder::class);
        $this->call(AmenityPropertySeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(AgentAndBlogImageSeeder::class);
        $this->call(ImagesPropertySeeder::class);
        $this->call(UserSeeder::class);









    }
}
