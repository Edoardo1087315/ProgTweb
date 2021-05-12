<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ticket', function (Blueprint $table) {
            $table->bigIncrements('TransId')->unsigned()->index();
            $table->date('data_acquisto');
            $table->float('prezzo');
            $table->integer('quantita');
            $table->string('username');
            $table->bigInteger('eventid')->unsigned();
            $table->foreign('eventid')->references('eventid')->on('event');
            $table->foreign('username')->references('username')->on('user');
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket');
    }
}
