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
            $table->renameColumn('area', 'area_id');
            $table->renameColumn('image', 'advertisment_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('industry_details', function (Blueprint $table) {
            $table->renameColumn('area', 'area_id');
            $table->renameColumn('image', 'advertisment_image');
        });
    }
};
