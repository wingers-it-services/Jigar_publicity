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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('orderId')->unique();
            $table->string('name')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('response_code')->nullable();
            $table->string('merchantId')->nullable();
            $table->string('transectionId')->nullable();
            $table->float('amount')->default(0);
            $table->integer('no_of_device');
            $table->integer('no_of_hour');
            $table->string('providerReferenceId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
