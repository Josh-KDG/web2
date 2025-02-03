<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Message.php
class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'conversation_id', 'read', 'type', 'body', /*'is_broadcast'*/];




    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function UtilisateurEnregistre()
    {
        return $this->belongsTo(UtilisateurEnregistre::class, 'sender_id');
    }
}

