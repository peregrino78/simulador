<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('particularities', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('descricao');
            $table->integer('age_limit');
            $table->integer('parcel_limit');
            $table->integer('agreement_id')->unsigned()->default(0);
            $table->foreign('agreement_id')->references('id')->on('agreements')->onDelete('cascade');
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
        Schema::dropIfExists('agreements');
        Schema::dropIfExists('particularities');
    }
}
