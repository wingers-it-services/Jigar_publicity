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
        Schema::create('industry_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('image');
            $table->uuid('book_id');
            $table->integer('category_id');
            $table->string('industry_name');
            $table->string('contact_no');
            $table->longText('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industry_details');
    }
};
