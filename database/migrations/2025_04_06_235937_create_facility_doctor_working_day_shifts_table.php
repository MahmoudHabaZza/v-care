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
        Schema::create('facility_doctor_working_day_shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_working_day_id')->constrained('facility_doctor_working_days')->cascadeOnDelete();
            $table->time('from');
            $table->time('to');
            $table->unsignedSmallInteger('visit_duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_doctor_working_day_shifts');
    }
};
