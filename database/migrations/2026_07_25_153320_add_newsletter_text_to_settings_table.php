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
            $table->json('footer_subscribe_subtitle')->nullable();
            $table->json('footer_subscribe_title')->nullable();
            $table->json('footer_subscribe_highlight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['footer_subscribe_subtitle', 'footer_subscribe_title', 'footer_subscribe_highlight']);
        });
    }
};
