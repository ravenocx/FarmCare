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
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->enum('category', ['Antraknosa', 'Flu Burung', 'Flu Babi', 'Ensefalitis Jepang', 'Enteritis Homogarik', 'Herpses Koi', 'Ensefalomielitis Burung', 'Hepatitis Badan Inklusi', 'Imunodefisiensi Kucing', 'Infeksi Kalisivirus Kucing']);
            $table->unsignedBigInteger("creator");
            $table->foreign('creator')->references('id')->on('veterinarians')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
