<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('nome');
            $table->string('cognome');
            $table->string('email');
            $table->string('username',20)->index();
            $table->string('password',20);
            $table->date('data_nascita');
            $table->unsignedBigInteger('telefono');
            $table->string('sitoweb');
            $table->integer('role',10);                   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('users');
    }
}