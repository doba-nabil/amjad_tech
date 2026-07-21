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
            $table->json('home_about_title')->nullable();
            $table->json('home_about_subtitle')->nullable();
            $table->json('home_about_text')->nullable();
            $table->string('home_about_image')->nullable();
            $table->boolean('show_about_section')->default(true)->nullable();

            $table->json('home_packages_title')->nullable();
            $table->json('home_packages_subtitle')->nullable();
            $table->json('home_packages_text')->nullable();
            $table->boolean('show_packages_section')->default(true)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'home_about_title', 'home_about_subtitle', 'home_about_text', 'home_about_image', 'show_about_section',
                'home_packages_title', 'home_packages_subtitle', 'home_packages_text', 'show_packages_section'
            ]);
        });
    }
};
