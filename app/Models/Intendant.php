<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intendant extends Model
{
    use HasFactory;
    protected $fillable = ['utilisateur_enregistre_id', 'bureau'];

    public function utilisateurEnregistre()
    {
        return $this->belongsTo(UtilisateurEnregistre::class, 'utilisateur_enregistre_id');

    }
}
