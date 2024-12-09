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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('admin_name');
            $table->string('username');
            $table->string('email', 250);
            $table->string('password');
            $table->timestamps();
        });

        DB::table('admins')->insert([
            'admin_name' => 'Site Admin',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => Hash::make('123456'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
