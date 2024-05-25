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
        Schema::create('network_equipments', function (Blueprint $table) {
            $table->id();
            $table->string('device_Name');
            $table->string('Model');
            $table->string('Manufacturer');
            $table->integer('number_ports');
            $table->string('security_Features');
            $table->string('Management_Interface');
            $table->integer('quantity');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('network_equipments');
    }
};
