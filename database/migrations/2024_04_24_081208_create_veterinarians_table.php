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
        Schema::create('veterinarians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('specialist', ['Livestock', 'Aquaculture', 'Poultry', 'Nutrition', 'Breeding', 'Dermatology']);
            $table->enum('gender', ['male','female']);
            $table->string('university');
            $table->string('phone_number');
            $table->integer('graduate_year');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('str_number');
            $table->string('certification');
            $table->boolean('is_accepted')->nullable()->default(null);
            $table->string('photo')->nullable();
            $table->decimal('consultation_price')->nullable();
            $table->decimal('reservation_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinarians');
    }
};