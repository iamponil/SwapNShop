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
      Schema::table('events', function (Blueprint $table) {
        $table->string('title');
        $table->string('description');
        $table->string('location');
        $table->unsignedBigInteger('community_id');
        $table->foreign('community_id')
          ->references('id')
          ->on('communities')
          ->onDelete('cascade')
          ->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('events', function (Blueprint $table) {
        $table->dropColumn('title');
        $table->dropColumn('description');
        $table->dropColumn('location');
        $table->dropForeign(['community_id']);
        $table->dropColumn('community_id');
      });
    }
};
