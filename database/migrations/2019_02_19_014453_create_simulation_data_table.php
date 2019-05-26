<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulationDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulation_data', function (Blueprint $table) {
            $table->increments('id');        
            $table->string('parcels_quantity')->nullable()->default(NULL);     // Quantidade de Parcelas
            $table->string('value_desired')->nullable()->default(NULL);        // Valor Desejado
            $table->string('balance_due')->nullable()->default(NULL);          // Saldo Devedor
            $table->string('contract_term')->nullable()->default(NULL);        // Prazo Contrato
            $table->string('paid_parcels')->nullable()->default(NULL);         // Parcelas Pagas
            $table->string('open_parcels')->nullable()->default(NULL);         // Parcelas Abertas
            $table->string('current_parcel_value')->nullable()->default(NULL); // Valor Parcela Atual
            $table->string('desired_parcel')->nullable()->default(NULL);       // Parcela Desejada
            $table->integer('client_id')->unsigned()->default(0);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->integer('operation_type_id')->unsigned()->default(0);
            $table->foreign('operation_type_id')->references('id')->on('operation_type')->onDelete('cascade');
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
        Schema::dropIfExists('simulation_data');
    }
}
