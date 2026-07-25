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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('client_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('location')->nullable();
            $table->date('project_date')->nullable();
            $table->string('duration')->nullable();
            $table->json('client_needs')->nullable();
            $table->json('working_process')->nullable();
            $table->json('check_and_launch')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['client_name', 'company_name', 'location', 'project_date', 'duration', 'client_needs', 'working_process', 'check_and_launch']);
        });
    }
};
