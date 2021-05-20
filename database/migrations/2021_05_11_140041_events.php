<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->bigIncrements('eventid')->unsigned()->index();
            $table->string('descrizione');
            $table->string('programma');
            $table->string('societa');
            $table->string('luogo');
            $table->string('categoria');
            $table->date('data');
            $table->time('orario');
            $table->string('nome');
            $table->integer('bigl_tot');
            $table->integer('bigl_acquis');
            $table->float('Xcord');
            $table->float('Ycord');
            $table->float('prezzo');
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
