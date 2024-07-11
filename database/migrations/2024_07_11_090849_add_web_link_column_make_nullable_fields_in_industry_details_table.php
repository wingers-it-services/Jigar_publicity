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
            $table->string('web_link')->nullable();
            $table->string('contact_no')->nullable()->change();
            $table->string('email')->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('industry_details', function (Blueprint $table) {
            $table->dropColumn('web_link');
            $table->dropColumn('contact_no');
            $table->dropColumn('email');
        });
    }
};
