<?php
// Migration pour la table personnes
// Migration pour la table personnes
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->id(); // Assure-toi que c'est un bigIncrements
            $table->string('nom');
            $table->string('prenom');
            $table->timestamps();

            $table->engine = 'InnoDB'; // Utiliser InnoDB
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};
