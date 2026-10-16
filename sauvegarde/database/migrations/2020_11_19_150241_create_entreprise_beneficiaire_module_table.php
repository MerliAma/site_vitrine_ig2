<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrepriseBeneficiaireModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprise_beneficiaire_module', function (Blueprint $table) {

            $table->id();
            $table->unsignedinteger('entreprise_id');
            $table->unsignedinteger('beneficiaire_id');
            $table->unsignedinteger('module_id');
            $table->date('date_demande');
            $table->string('attentes')->nullable();
            $table->boolean('booldmdF');

            $table->foreign('entreprise_id')->references('id')->on('entreprises');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires');

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
        Schema::dropIfExists('entreprise_beneficiaire_module');
    }
}
