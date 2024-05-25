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
        Schema::create('laptop_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laptop_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('laptop_id')->references('id')->on('laptops')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptop_user');
    }
};
