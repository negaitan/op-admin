<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clubs')) {
            Schema::create('clubs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name'); // nombre: 'Clubes.nombre',
                $table->unsignedInteger('web_text_id')->nullable(); // textoHeader: 'TextosWeb.clubesHeader',
                $table->foreign('web_text_id')
                    ->references('id')
                    ->on('web_texts');

                $table->string('address'); // direccion: 'Clubes.direccion',
                $table->string('opening_time'); // horarios: 'Clubes.horariosApertura',
				// amenities: [ Clubes.amenities ],
				// imagenes: [ Clubes.imagenes.url ],
                $table->string('latitude'); // latitud: 'Clubes.latitud',
                $table->string('longitude'); // longitud: 'Clubes.longitud',
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
        Schema::dropIfExists('clubs');
    }
}
