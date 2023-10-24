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
        Schema::create('reclamtions', function (Blueprint $table) {
            $table->id();
            $table->string('nomRec');
            $table->string('body');
            $table->string('image');
            $table->string('statue');
            $table->boolean('archived')->default(0); // Définir la valeur par défaut
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('reclamtions');
    }
};
