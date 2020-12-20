<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldados', function (Blueprint $table) {
            $table->string('NumeroPlaca',25);
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('fechaNacimiento',8);  
            $table->enum('rango',['soldado', 'sargento', 'capitán']);
            $table->enum('estado',['activo', 'retirado', 'baja']);
            $table->timestamps();



            $table->primary('NumeroPlaca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soldados');
    }
}
