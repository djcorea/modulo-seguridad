<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->string('parametro');
            $table->string('valor');
            $table->unsignedBigInteger('Modificado_Por')->nullable();
            $table->unsignedBigInteger('Creado_Por');
            $table->timestamps();

            $table->foreign('Modificado_Por')->references('id')
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
        Schema::dropIfExists('parametros');
    }
}
