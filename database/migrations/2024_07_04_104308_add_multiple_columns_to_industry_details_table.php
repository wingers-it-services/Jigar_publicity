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
        Schema::table('industry_details', function (Blueprint $table) {
            $table->string('email');
            $table->string('product')->nullable();
            $table->string('by_product')->nullable();
            $table->string('raw_material')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('industry_details', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('product');
            $table->dropColumn('by_product');
            $table->dropColumn('raw_material');
        });
    }
};
