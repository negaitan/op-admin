<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('flashes')) {
            Schema::create('flashes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('zona'); // nombre
                $table->string('name_plan'); // nombre
                $table->float('precio_flash'); // precioMensual
                $table->string('label_flash'); // nombre
                $table->float('precio_especial'); // precioMensual
                $table->string('label_especial'); // nombre
                $table->float('precio_onSale'); // precioMensual
                $table->string('label_onSale'); // nombre
                $table->float('precio_regular'); // precioMensual
                $table->string('label_regular'); // nombre

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
        Schema::dropIfExists('flashs');
    }
}
