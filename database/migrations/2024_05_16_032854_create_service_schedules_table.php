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
        Schema::create('service_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("veterinarian_id");
            $table->timestamp('schedule');
            $table->enum('service_category', ['consultation' , 'reservation']);
            $table->boolean('is_reserved');
            $table->timestamps();
            $table->foreign('veterinarian_id')->references('id')->on('veterinarians')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_schedules');
    }
};