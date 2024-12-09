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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->text('descr')->nullable();
            $table->string('btn_text')->nullable();
            $table->string('btn_link')->nullable();
            $table->boolean('status')->default('1');
            $table->timestamps();
        });

        DB::table('banners')->insert([
            'image' => 'banner1.png',
            'title' => 'Crafting your exceptional dinning',
            'descr' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium'  ,
        ]);
        DB::table('banners')->insert([
            'image' => 'banner2.png',
            'title' => 'We do not cook, we create your emotions!',
            'descr' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium'  ,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
