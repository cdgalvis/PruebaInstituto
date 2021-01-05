<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->required();
            $table->integer('duracion')->required();
            $table->date('fechainicio')->required();
            $table->date('fechafin')->required();
            $table->string('sede')->required();
            $table->string('jornada')->required();
            $table->text('descripcion')->required();
            $table->text('imagen')->required();
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
        Schema::dropIfExists('cursos');
    }
}
