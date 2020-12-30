<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentAndBlogImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_and_blog_images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
//            $table->unsignedBigInteger("imageable_id");
//            $table->unsignedBigInteger("imageable_type");
            $table->morphs("imageable");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_and_blog_images');
    }
}
