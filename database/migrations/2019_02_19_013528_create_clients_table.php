<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cpf')->unique();
            $table->date('birthday');

            $table->integer('state_id')->unsigned()->default(0); //Estado
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');

            $table->integer('city_id')->unsigned()->default(0); //Cidade
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            
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
        Schema::dropIfExists('clients');
    }
}
