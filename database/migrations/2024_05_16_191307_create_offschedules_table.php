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
        Schema::create('offschedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('veterinarian_id')->reference('id')->on('veterinarians')->constrained()->onDelete('cascade');
            $table->string('specialist'); // Menambahkan kolom specialist
            $table->decimal('reservation_price', 8, 2); // Menambahkan kolom reservation_price
            $table->date('date');
            $table->enum('session', ['07:00-11:00', '13:00-17:00']);
            $table->string('status')->default('available');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offschedules');
    }
};
