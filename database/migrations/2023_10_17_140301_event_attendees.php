<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('event_attendees', function (Blueprint $table) {
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('event_id');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')
        ->onUpdate('cascade');
      $table->primary(['user_id', 'event_id']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('event_attendees');
  }
};
