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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('views')->nullable()->default(0);
            $table->string('bio')->nullable();
            $table->text('about')->nullable();
            $table->unsignedTinyInteger('experience_years')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('speciality_id')->nullable()->constrained('specialities')->nullOnDelete();
            $table->foreignId('doctor_role_id')->nullable()->constrained('doctor_roles')->nullOnDelete();
            $table->decimal('fees',8,2)->default(0);
            $table->decimal('rate',2,1)->default(0);
            $table->unsignedSmallInteger('waiting_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
