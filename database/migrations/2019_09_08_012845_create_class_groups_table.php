<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('class_groups')) {
            Schema::create('class_groups', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name'); // nombre
                $table->unsignedInteger('logo_image_id')->nullable(); // imagenLogo
                $table->text('description'); // textoPrincipal
                $table->unsignedInteger('cover_image_id')->nullable(); // imagenCover
                $table->string('video_url'); // videoUrlCover
                $table->text('classes'); // clases[text]
                $table->unsignedInteger('teacher_image_id')->nullable(); // imagenProfe
                $table->string('teacher_name'); // nombreProfe
                $table->string('teacher_title'); // tituloProfe
                $table->text('teacher_text'); // textoProfe
                $table->string('playlist_url'); // playlistUrl
                $table->softDeletes();
                $table->timestamps();

                $table->foreign('logo_image_id')->references('id')->on('images');
                $table->foreign('cover_image_id')->references('id')->on('images');
                $table->foreign('teacher_image_id')->references('id')->on('images');
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
        Schema::dropIfExists('class_groups');
    }
}
