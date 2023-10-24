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
        Schema::create('echanges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_offre_confirme'); // Clé étrangère vers l'offre confirmée
            $table->unsignedBigInteger('id_user'); // Clé étrangère vers l'utilisateur qui confirme
            $table->unsignedBigInteger('id_livraison')->nullable(); // Clé étrangère vers la livraison (peut être nulle)
            $table->timestamps();

            // Ajoutez des contraintes de clé étrangère si nécessaire
            $table->foreign('id_offre_confirme')->references('id')->on('offres');
            $table->foreign('id_user')->references('id')->on('users');
            // Ajoutez la contrainte de clé étrangère pour la livraison une fois la table de livraison créée
            // $table->foreign('id_livraison')->references('id')->on('livraisons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('echanges');
    }
};
