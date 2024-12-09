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
        Schema::create('order_lists', function (Blueprint $table) {
            $table->id('id');
            $table->integer('customer');
            $table->integer('customer_type');
            $table->integer('table');
            $table->integer('waiter');
            $table->integer('amount');
            $table->integer('tax_amount');
            $table->integer('net_amount');
            $table->integer('pay_method');
            $table->integer('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_lists');
    }
};
