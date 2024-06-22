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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('image');
            $table->string('book_name');
            $table->float('book_price');
            $table->string('association_name');
            $table->string('association_web_link');
            $table->string('association_email');
            $table->string('association_ph_no');
            $table->longText('association_address');
            $table->string('publication_name');
            $table->string('publication_web_link');
            $table->string('publication_email');
            $table->string('publication_ph_no');
            $table->longText('publication_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
