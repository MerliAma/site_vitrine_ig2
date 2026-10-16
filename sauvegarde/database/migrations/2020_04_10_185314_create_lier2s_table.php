<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLier2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lier2s', function (Blueprint $table) {
            $table->id();
            $table->integer('dmdPrest');  //clé etrangère dmdPrest
            $table->integer('typePrest');  //clé etrangère typePrest
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
        Schema::dropIfExists('lier2s');
    }
}
