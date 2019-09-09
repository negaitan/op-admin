<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('club_id');
            $table->unsignedInteger('plan_id');
            $table->timestamps();

            $table->foreign('club_id')->references('id')->on('clubs');
            $table->foreign('plan_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_plan');
    }
}
