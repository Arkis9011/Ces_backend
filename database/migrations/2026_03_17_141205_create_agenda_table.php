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
        Schema::create('agendas', function (Blueprint $table) {
        $table->id();
        $table->date('date');           // La date de l'événement
        $table->time('heure')->nullable(); // L'heure précise
        $table->string('title');        // Le titre de l'activité
        $table->string('lieu')->nullable(); // L'endroit (ex: Salle de conférence)
        $table->text('summary');        // Le résumé ou l'ordre du jour
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
