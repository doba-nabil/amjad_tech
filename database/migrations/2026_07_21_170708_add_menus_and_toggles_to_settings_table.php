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
            $table->json('header_links')->nullable();
            $table->json('footer_links')->nullable();
            $table->boolean('show_services_section')->default(true);
            $table->boolean('show_projects_section')->default(true);
            $table->boolean('show_blogs_section')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'header_links',
                'footer_links',
                'show_services_section',
                'show_projects_section',
                'show_blogs_section'
            ]);
        });
    }
};
