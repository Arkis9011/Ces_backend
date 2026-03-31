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
        Schema::table('posts', function (Blueprint $table) {
            // Ajout des 3 zones de texte supplémentaires
            $table->text('section_1')->nullable()->after('contenu');
            $table->text('section_2')->nullable()->after('section_1');
            $table->text('section_3')->nullable()->after('section_2');

            // Ajout des 3 colonnes de photos supplémentaires
            $table->string('image_url_2')->nullable()->after('image_url');
            $table->string('image_url_3')->nullable()->after('image_url_2');
            $table->string('image_url_4')->nullable()->after('image_url_3');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['section_1', 'section_2', 'section_3', 'image_url_2', 'image_url_3', 'image_url_4']);
        });
    }
};
