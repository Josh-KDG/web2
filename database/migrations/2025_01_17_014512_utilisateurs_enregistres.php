<?php
// Migration pour la table utilisateurs_enregistres
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('utilisateurs_enregistres', function (Blueprint $table) {
            $table->id(); // Assure-toi que c'est un bigIncrements
            $table->string('Mot_de_passe')->nullable(false);
            $table->string('Email')->nullable(false);
            $table->unsignedBigInteger('personne_id');
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
            $table->timestamp('Derniere_utilisation')->nullable();
            $table->enum('role', ['eleve', 'parent', 'enseignant', 'directeur', 'secretaire', 'intendant', 'surveillant'])->default('eleve');
            $table->timestamps();

            $table->engine = 'InnoDB'; // Utiliser InnoDB
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('utilisateurs_enregistres');
    }
};


