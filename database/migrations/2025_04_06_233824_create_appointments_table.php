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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email')->nullable();
            $table->string('phone_number');
            $table->date('date');
            $table->boolean('has_insurance')->default(0);
            $table->decimal('price_before_discount',8,2);
            $table->decimal('final_price',8,2);
            $table->time('from')->nullable();
            $table->time('to')->nullable();
            $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();
            $table->foreignId('shift_id')->constrained('facility_working_day_shifts')->cascadeOnDelete();
            $table->unsignedSmallInteger('shift_index_slot');
            $table->enum('status',[0,1,2,3])->default(0); // 0 active
            $table->text('notes')->nullable();
            $table->unique(['shift_id','date','shift_index_slot'],'unique_slot_booking');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
