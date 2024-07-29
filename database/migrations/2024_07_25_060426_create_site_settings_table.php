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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('one_device_per_hour');
            $table->integer('two_device_per_hour');
            $table->integer('three_device_per_hour');
            $table->integer('four_device_per_hour');
            $table->integer('five_device_per_hour');
            $table->integer('six_device_per_hour');
            $table->integer('seven_device_per_hour');
            $table->integer('eight_device_per_hour');
            $table->integer('nine_device_per_hour');
            $table->integer('ten_device_per_hour');
            $table->float('igst');
            $table->boolean('payment_gateway_allow')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
