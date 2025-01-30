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
                $table->foreignId('sender_id')->constrained('users');
                $table->foreignId('receiver_id')->nullable()->constrained('users');
                $table->text('content');
                $table->boolean('is_broadcast')->default(false);  // Indicateur de diffusion
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
