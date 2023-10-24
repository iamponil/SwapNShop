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
        Schema::create('livraisonnns', function (Blueprint $table) {
            $table->id();
          $table->foreignId('Id_echange')->constrained('echanges');
          $table->foreignId('Id_adresse_livraison')->constrained('adresse_livraisons');
          $table->foreignId('Id_user')->constrained('users');
          $table->date('Date_envoi');
          $table->string('Statut')->default('en attente'); // Par défaut, le statut est "en attente"
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
        Schema::dropIfExists('livraisonnns');
    }
};
