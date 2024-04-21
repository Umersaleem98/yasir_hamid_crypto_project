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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('projectName')->nullable();
            $table->string('projectSymbol')->nullable();
            $table->string('projectLogo')->nullable();
            $table->string('selectProjectType')->nullable();
            $table->string('selectProjectCategory')->nullable();
            $table->string('selectProjectStandard')->nullable();
            $table->string('selectProjectPlatform')->nullable();
            $table->string('selectProjectDomain')->nullable();
            $table->string('projectAuditFile')->nullable();
            $table->date('projectLaunchDate')->nullable();
            $table->string('projectWebsiteURL')->nullable();
            $table->string('projectGitHubURL')->nullable();
            $table->string('projectTotalSupply')->nullable();
            $table->string('projectCirculatingSupply')->nullable();
            $table->string('projectWhitepaperURL')->nullable();
            $table->string('selectProjectSocialMedia')->nullable();
            $table->string('enterSocialMediaURL')->nullable();
            $table->string('selectDeveloper')->nullable();
            $table->string('selectCompany')->nullable();
            $table->string('selectPromoterName')->nullable();
            $table->string('selectPrivateInvestor')->nullable();
            $table->string('privateInvestorTokenRelease')->nullable();
            $table->enum('radioInvestorRelease', ['full', 'partial', 'no'])->nullable();
            $table->text('comment')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
