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
        Schema::table('contact_details', function (Blueprint $table) {
            $table->string('mobile')->nullable()->change();
            $table->string('email_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_details', function (Blueprint $table) {
            $table->dropColumn('mobile');
            $table->dropColumn('email_id');
        });
    }
};
