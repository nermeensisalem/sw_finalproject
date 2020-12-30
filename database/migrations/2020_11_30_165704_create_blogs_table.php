<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
//            $table->string("image")->default("blog_images/img.jpg");
            $table->unsignedBigInteger("author_id")->nullable();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->date("date");
            $table->string("body");
            $table->timestamps();

            $table->foreign("author_id")->references("id")->on("authors")->onDelete('SET NULL');
            $table->foreign("category_id")->references("id")->on("categories")->
            onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
