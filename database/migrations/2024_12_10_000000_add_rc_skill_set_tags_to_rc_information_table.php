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
        Schema::table('rc_information', function (Blueprint $table) {
            $table->json('rcSkillSetTags')->nullable()->change(); // Use JSON for storing tags
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rc_information', function (Blueprint $table) {
            $table->string('rcSkillSetTags')->nullable()->change(); // Revert to string
        });
    }
};
