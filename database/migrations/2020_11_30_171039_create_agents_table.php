<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
//            $table->string("image")->default('agent_images/img.jpg');
            $table->string("phone");
            $table->string("email");
            $table->string("facebookLink");
            $table->string("instagramLink");
            $table->string("twitterLink");
            $table->string("pintrestLink");
            $table->string("dribbleLink");
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
        Schema::dropIfExists('agents');
    }
}
