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
        Schema::create('manage_food', function (Blueprint $table) {
            $table->id("food_id");
            $table->string('food_name');
            $table->string('category');
            $table->string('Kitchen');
            $table->string('menu_type');
            $table->string('description')->nullable();
            $table->string('image');
            $table->string('cooking_time');
            $table->string('price');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage_food');
    }
};
