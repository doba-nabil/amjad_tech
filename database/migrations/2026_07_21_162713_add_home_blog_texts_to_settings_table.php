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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('home_blog_title')->nullable()->default('All Blog');
            $table->string('home_blog_subtitle')->nullable()->default('Latest Post');
            $table->text('home_blog_text')->nullable();
            
            $table->string('home_services_title')->nullable()->default('Our Solutions');
            $table->string('home_services_subtitle')->nullable()->default('Services');
            $table->text('home_services_text')->nullable();

            $table->string('home_projects_title')->nullable()->default('Project');
            $table->string('home_projects_subtitle')->nullable()->default('Look at my work');
            $table->text('home_projects_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'home_blog_title', 'home_blog_subtitle', 'home_blog_text',
                'home_services_title', 'home_services_subtitle', 'home_services_text',
                'home_projects_title', 'home_projects_subtitle', 'home_projects_text',
            ]);
        });
    }
};
