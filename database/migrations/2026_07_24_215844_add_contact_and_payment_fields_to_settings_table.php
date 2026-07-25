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
            $table->string('contact_lat')->nullable();
            $table->string('contact_lng')->nullable();
            $table->string('contact_image')->nullable();
            $table->string('contact_banner')->nullable();
            $table->json('payment_settings')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['contact_lat', 'contact_lng', 'contact_image', 'contact_banner', 'payment_settings']);
        });
    }
};
