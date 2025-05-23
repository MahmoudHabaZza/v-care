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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->decimal('clinic_rate',2,1)->nullable();
            $table->decimal('assistant_rate',2,1)->nullable();
            $table->decimal('doctor_rate',2,1)->nullable();
            $table->string('comment')->nullable();
            $table->foreignId('appointment_id')->constrained('appointments')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
