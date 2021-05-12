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
            $table->date('data');
            $table->string('nome');
            $table->integer('bigl_disp');
            $table->integer('bigl_acquis');
            $table->float('Xcord');
            $table->float('Ycord');
            $table->float('prezzo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
