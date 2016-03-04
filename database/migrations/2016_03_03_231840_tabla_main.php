<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ano');
            $table->string('codigo');
            $table->string('sector');
            $table->string('unidad_ejecutora');
            $table->string('prog');
            $table->string('subp');
            $table->string('proy');
            $table->string('subp2');
            $table->string('rec');
            $table->string('sit');
            $table->string('nombre');
            $table->string('apropiacion_inicial');
            $table->string('apropiacion_vigente');
            $table->string('compromisos');
            $table->string('obligaciones');
            $table->string('pagos');
            $table->string('fuente');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
