<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('customer_types')->insert([
            'title' => 'Dine in Customer',
            'slug' => 'dine-in-customer',
        ]);

        DB::table('customer_types')->insert([
            'title' => 'Online Customer',
            'slug' => 'online-customer',
        ]);

        DB::table('customer_types')->insert([
            'title' => 'Take Away',
            'slug' => 'take-away',
        ]);
        
        DB::table('customer_types')->insert([
            'title' => 'Third Party Platform',
            'slug' => 'third-party-platform',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_types');
    }
};
