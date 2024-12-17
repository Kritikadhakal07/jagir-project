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
        // Add the rcUniqueId column if it doesn't already exist
        if (!Schema::hasColumn('rc_information', 'rcUniqueId')) {
            Schema::table('rc_information', function (Blueprint $table) {
                $table->string('rcUniqueId')->unique()->after('rcSkillSetTags');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('rc_information', 'rcUniqueId')) {
            Schema::table('rc_information', function (Blueprint $table) {
                $table->dropColumn('rcUniqueId');
            });
        }
    }
};
