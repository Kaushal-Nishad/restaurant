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
        Schema::create('customer_lists', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_name');
            $table->string('email',250)->nullable();
            $table->string('password')->nullable();
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('created_by');
            $table->timestamps();
        });

        DB::table('customer_lists')->insert([
            'customer_name' => 'Walk In',
            'phone' => '9999999999',
            'created_by' => 'admin',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_lists');
    }
};
