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
        Schema::create('network_equipment_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('network_equipment_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('network_equipment_id')->references('id')->on('network_equipments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('network_equipment_user');
    }
};
