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
            $table->text('rcSkillSetTags')->nullable()->change(); // Use `json` instead of `text` if your database supports JSON
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
