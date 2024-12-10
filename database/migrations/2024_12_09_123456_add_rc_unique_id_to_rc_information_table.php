
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rc_information', function (Blueprint $table) {
            $table->uuid('rcUniqueId')->default(Uuid::uuid4()->toString())->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rc_information', function (Blueprint $table) {
            $table->dropColumn('rcUniqueId');
        });
    }
};
