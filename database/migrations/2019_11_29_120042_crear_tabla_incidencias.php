<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaIncidencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Incidencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreProfesor');
            $table->string('fechaIncidencia');
            $table->string('aula');
            $table->string('codigoIncidencia');
            $table->string('especificacion')->nullable();
            $table->string('estado')->default('En proceso/Enviada');
            $table->string('equipo');
            $table->unsignedBigInteger('profesorId');
            $table->foreign('profesorId')    
                ->references('id')->on('profesor')
                ->onDelete('cascade');
            $table->string('comentarios')->default('');
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
        Schema::dropIfExists('Incidencia');
    }

   
}
