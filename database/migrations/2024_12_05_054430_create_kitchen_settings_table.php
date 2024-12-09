<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kitchen_settings', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('password');
            $table->boolean('status')->default('1');
            $table->timestamps();
        });

        DB::table('kitchen_settings')->insert([
            'username' => 'admin',
            'password' => Hash::make('123456'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitchen_settings');
    }
};
