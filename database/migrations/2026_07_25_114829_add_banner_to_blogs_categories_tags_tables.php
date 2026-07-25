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
        if (!Schema::hasColumn('blogs', 'banner')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->string('banner')->nullable()->after('image');
            });
        }

        if (!Schema::hasColumn('categories', 'banner')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->string('banner')->nullable();
            });
        }

        if (!Schema::hasColumn('tags', 'banner')) {
            Schema::table('tags', function (Blueprint $table) {
                $table->string('banner')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('banner');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('banner');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('banner');
        });
    }
};
