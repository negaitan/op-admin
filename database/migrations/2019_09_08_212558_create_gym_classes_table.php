<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('gym_classes')) {
            Schema::create('gym_classes', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('club_id')->nullable(); // textoHeader: 'TextosWeb.clubesHeader',
                $table->foreign('club_id')
                    ->references('id')
                    ->on('clubs');
                $table->string('name'); // nombre
                $table->string('teacher'); // profesor
                $table->string('day_time'); // [manana, tarde, noche]
                $table->text('week_days'); // [lun, mar, mier] || diaSemana (Agregado por maru)
                $table->time('start_at'); // horarioEntrada
                $table->time('finish_at'); // horarioSalida
                $table->string('room'); // salon
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_classes');
    }
}
