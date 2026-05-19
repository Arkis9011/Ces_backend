<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Sections supplémentaires (4, 5, 6)
            $table->longText('section_4')->nullable()->after('section_3');
            $table->longText('section_5')->nullable()->after('section_4');
            $table->longText('section_6')->nullable()->after('section_5');

            // Images supplémentaires (5, 6)
            $table->string('image_url_5', 500)->nullable()->after('image_url_4');
            $table->string('image_url_6', 500)->nullable()->after('image_url_5');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['section_4', 'section_5', 'section_6', 'image_url_5', 'image_url_6']);
        });
    }
};