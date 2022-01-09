<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetos', function (Blueprint $table) {
            $table->id();
            $table->string('objeto');
            $table->string('Descripcion');
            $table->unsignedBigInteger('Actualizado_Por')->nullable();
            $table->unsignedBigInteger('Creado_Por');
            $table->timestamps();

            $table->foreign('Actualizado_Por')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Creado_Por')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objetos');
    }
}
