<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idproduit_a_echanger');
            $table->unsignedBigInteger('idproduit_pour_echanger_avec');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
            $table->foreign('idproduit_a_echanger')->references('id')->on('products');
            $table->foreign('idproduit_pour_echanger_avec')->references('id')->on('products');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offres');
    }
};
