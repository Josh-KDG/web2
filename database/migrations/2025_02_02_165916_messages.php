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
        // Migration pour créer la table messages
            Schema::create('messages', function (Blueprint $table) {
                $table->id();
                $table->foreignId('Conversation_id')->constrained('utilisateurs_enregistres');
                $table->foreignId('sender_id')->constrained('users');
                $table->foreignId('receiver_id')->nullable()->constrained('utilisateurs_enregistres');
                $table->text('content');
                //$table->boolean('is_broadcast')->default(false);  // Indicateur de diffusion
                $table->boolean('read')->default(0)->nulable();  // Indicateur de diffusion
                $table->text('body')->nulable();  // Indicateur de diffusion
                $table->string('type')->nulable();  // Indicateur de diffusion
                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
