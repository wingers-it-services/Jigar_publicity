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
        Schema::create('unit_details', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->integer('industry_detail_id');
            $table->string('unit_name');
            $table->string('unit_contact_no');
            $table->longText('unit_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_details');
    }
};
