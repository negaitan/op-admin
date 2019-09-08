<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_image', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('club_id');
            $table->unsignedInteger('image_id');
            $table->timestamps();

            $table->foreign('club_id')->references('id')->on('clubs');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_image');
    }
}
