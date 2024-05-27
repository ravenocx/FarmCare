<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("veterinarian_id");
            $table->string('medicine');
            $table->unsignedInteger('quantity');
            $table->decimal('price');
            $table->string('address');
            $table->enum('order_status', ['On going', 'Complete', 'Cancel']);
            $table->timestamps();
            $table->foreign('veterinarian_id')->references('id')->on('veterinarians')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
