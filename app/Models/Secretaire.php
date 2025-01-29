<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaire extends Model
{
    use HasFactory;
    protected $fillable = ['bureau','utilisateur_enregistre_id'];

    public function utilisateurEnregistre()
    {
        return $this->belongsTo(UtilisateurEnregistre::class, 'utilisateur_enregistre_id');

    }
}
