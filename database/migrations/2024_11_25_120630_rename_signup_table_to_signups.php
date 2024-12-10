<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSignupTableToSignups extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('signup', 'signups');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('signups', 'signup');
    }
}
