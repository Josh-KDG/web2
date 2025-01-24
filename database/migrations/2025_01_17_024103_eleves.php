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

        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('INE')->unique();
            $table->string('Sexe')->unique();
            $table->enum('classe', ['6','5','4','3','2','1','tle']);
            $table->date('date_de_naissance');
            $table->unsignedBigInteger('utilisateur_enregistre_id');
            $table->foreign('utilisateur_enregistre_id')->references('id')->on('utilisateurs_enregistres')->onDelete('cascade');
            $table->timestamp('Derniere_utilisation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');

    }
};
