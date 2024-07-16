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
        Schema::table('user_inquiries', function (Blueprint $table) {
            $table->renameColumn('gym_id', 'status');
            $table->renameColumn('inquiry_title', 'subject');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_inquiries', function (Blueprint $table) {
            $table->renameColumn('status', 'gym_id');
            $table->renameColumn('subject', 'inquiry_title');

        });
    }
};
