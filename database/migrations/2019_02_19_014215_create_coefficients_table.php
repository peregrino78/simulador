<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoefficientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coefficients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term'); //Prazo
            $table->string('rate'); // Taxa
            $table->string('factor'); // Fator
            $table->date('date');
            $table->integer('agreement_id')->unsigned()->default(0);
            $table->foreign('agreement_id')->references('id')->on('agreements')->onDelete('cascade');
            $table->integer('operation_type_id')->unsigned()->default(0);
            $table->foreign('operation_type_id')->references('id')->on('operation_type')->onDelete('cascade');
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
        Schema::dropIfExists('coefficients');
    }
}
