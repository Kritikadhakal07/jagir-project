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
        Schema::create('rc_information', function (Blueprint $table) {
            $table->id();
           
            $table->string('rcPhoneNumber');
            $table->text('rcFullAddress');
            $table->text('rcSkillSetTags'); 
            
            $table->text('rcBio')->nullable();
            $table->string('rcCurrentJob')->nullable();
            $table->string('rcCurrentEmployer')->nullable();
            $table->string('rcLastJob')->nullable();
            $table->string('rcLastEmployer')->nullable();
            $table->string('rcLinktoPortfolio')->nullable();
            $table->text('rcCommunicationQues')->nullable(); 
            $table->text('rcDaytoDayQues')->nullable();
            $table->text('rcChallengeQues')->nullable(); 
            $table->text('rc5yrs')->nullable();
            $table->string('rcExpSalaryCurrency'); 
            $table->decimal('rcExpSalary', 10, 2);
            $table->string('rcHighestEdu');
            $table->year('rcHighestEduCompletedDate'); 
            $table->string('rcCV')->nullable(); 
            $table->string('rcPhoto')->nullable();
            $table->string('rcRole'); 
            $table->uuid('rcUniqueId')->unique();
            $table->integer('rcYearsOfExperience');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rc_information');
    }
};
