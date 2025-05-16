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
        Schema::create('special_offers', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('description')->nullable();
            $table->unsignedSmallInteger('discount_percentage')->default(0);
            $table->decimal('old_price',8,2);
            $table->unsignedSmallInteger('usage_count')->default(0);
            $table->boolean('status')->default(1);
            $table->morphs('discountable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_offers');
    }
};
