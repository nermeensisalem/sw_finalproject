<?php

use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=15; $i++){
            \Illuminate\Support\Facades\DB::table("blog_category")->insert([
               'blog_id'=>\App\Blog::all()->random()->id,
                'category_id'=>\App\Category::all()->random()->id,


            ]);
        }
    }
}
