<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $fillable = ['sender_id', 'receiver_id', 'last_time_message'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function UtilisateurEnregistre()
    {
        return $this->belongsTo(UtilisateurEnregistre::class);
    }
}
