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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("veterinarian_id");
            $table->string('cust_name');
            $table->string('order_address');
            $table->string('cust_phone_number');
            $table->string('veter_phone_number');
            $table->string('payment_proof');
            $table->timestamp('appointment_date');
            $table->enum('category', ['Livestock', 'Aquaculture', 'Poultry', 'Nutrition', 'Breeding', 'Dermatology']);
            $table->enum('service_category', ['consultation' , 'reservation']);
            $table->enum('order_status', ['On going', 'Complete', 'Cancel']);
            $table->timestamp('order_date')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->unsignedBigInteger("schedule_id");
            $table->decimal('price');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('veterinarian_id')->references('id')->on('veterinarians')->onDelete('CASCADE');
            $table->foreign('schedule_id')->references('id')->on('service_schedules')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
