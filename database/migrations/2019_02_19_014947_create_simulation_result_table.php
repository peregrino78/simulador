<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulationResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulation_result', function (Blueprint $table) {
            $table->increments('id');
            $table->string('balance');          // Saldo
            $table->string('parcel');           // Parcela
            $table->string('parcel_value');     // Valor da Parcela
            $table->string('value');            // Valor do Emprestimo
            $table->string('change');           // Troco
            $table->string('result');           // Resultado
            $table->string('santander_rate');   // Taxa Santander
            $table->integer('id_simulation_data')->unsigned()->default(0);
            $table->foreign('id_simulation_data')->references('id')->on('simulation_data')->onDelete('cascade');
            $table->integer('id_user')->unsigned()->default(0);
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('simulation_result');
    }
}
