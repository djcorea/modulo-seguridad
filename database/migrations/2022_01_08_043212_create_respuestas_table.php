<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {

            $table->unsignedBigInteger('id_pregunta');
            $table->unsignedBigInteger('id_usuario');
            $table->string('respuesta');
            $table->primary(['id_pregunta','id_usuario']);

            $table->foreign('id_pregunta')->references('id')
                ->on('preguntas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('respuestas');
    }
}
