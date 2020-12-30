<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->unsignedBigInteger("type_id")->nullable();
            $table->integer("area")->default(0);
            $table->integer("beds")->default(0);
            $table->integer("baths")->default(0);
            $table->integer("garage")->default(0);
            $table->string("location");
            $table->string("status");
            $table->integer("price");
            $table->unsignedBigInteger("agent_id")->nullable();
            $table->timestamps();

            $table->foreign("agent_id")->references("id")->on("agents")->onDelete('SET NULL');
            $table->foreign("type_id")->references("id")->on("property_types")->onDelete('SET NULL');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
