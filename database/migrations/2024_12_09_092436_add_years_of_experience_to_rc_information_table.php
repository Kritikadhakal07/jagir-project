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
        if (!Schema::hasColumn('rc_information', 'rcYearsOfExperience')) {
            Schema::table('rc_information', function (Blueprint $table) {
                $table->integer('rcYearsOfExperience')->nullable()->default(0)->after('rcSkillSetTags');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('rc_information', 'rcYearsOfExperience')) {
            Schema::table('rc_information', function (Blueprint $table) {
                $table->dropColumn('rcYearsOfExperience');
            });
        }
    }
};
