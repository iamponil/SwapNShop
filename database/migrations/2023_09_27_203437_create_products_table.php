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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('product_name');
            $table->text('description');
            $table->string('category');
            $table->unsignedBigInteger('user_id'); // Foreign key
            $table->string('location');
            $table->json('images'); // Store image URLs in JSON format
            $table->timestamps(); // Created_at and updated_at timestamps
            
            // Define the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users'); // Assuming a "users" table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
