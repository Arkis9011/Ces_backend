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
        Schema::table('avis', function (Blueprint $table) {
            // On ajoute une colonne de type date, nullable pour ne pas bloquer les anciens enregistrements
            $table->date('date_publication')->nullable()->after('commission');
        });
    }
    
    public function down(): void
    {
        Schema::table('avis', function (Blueprint $table) {
            $table->dropColumn('date_publication');
        });
    }
};
