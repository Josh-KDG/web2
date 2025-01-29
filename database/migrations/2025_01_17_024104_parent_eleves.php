<?php
// database/migrations/YYYY_MM_DD_create_parent_eleves_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Table des relations parent-éleve
        Schema::create('parent_eleves', function (Blueprint $table) {
            $table->id();
            // Ajout de la clé étrangère pour 'utilisateur_enregistre'
            $table->unsignedBigInteger('utilisateurs_enregistres_id');
            $table->foreign('utilisateurs_enregistres_id')
                ->references('id')->on('utilisateurs_enregistres')
                ->onDelete('cascade');

            // Ajout de la clé étrangère pour 'eleve'
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
                ->references('id')->on('eleves')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parent_eleves');
    }
};
