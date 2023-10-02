<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant', 10, 2);
            $table->dateTime('date_heure_paiement');
            $table->string('statut_paiement');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('commande_id')->nullable();
            $table->unsignedBigInteger('payment_method_id'); // Add this line for the foreign key
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('commande_id')->references('id')->on('commandes')->nullable();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods'); // Define the foreign key
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
