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
        Schema::create('surveillants', function (Blueprint $table) {
            $table->id();
            $table->integer('bureau');
            $table->unsignedBigInteger('utilisateurs_enregistres_id');
            $table->foreign('utilisateurs_enregistres_id')->references('id')->on('utilisateurs_enregistres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveillants');
    }
};
