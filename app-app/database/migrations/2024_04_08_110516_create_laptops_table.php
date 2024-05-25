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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('laptop_name');
            $table->string('model');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->integer('quantity');
            $table->string('screen_size');
            $table->string('graphics_card')->nullable();
            $table->string('battery_life');
            $table->string('status');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
