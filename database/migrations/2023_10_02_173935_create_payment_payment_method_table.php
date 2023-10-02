<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentPaymentMethodTable extends Migration
{
    public function up()
    {
        Schema::create('payment_payment_method', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_payment_method');
    }
};
