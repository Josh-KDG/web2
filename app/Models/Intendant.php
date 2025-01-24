<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intendant extends Model
{
    use HasFactory;
    protected $fillable = ['utilisateurs_enregistres_id', 'bureau'];

    public function utilisateurEnregistre()
    {
        return $this->belongsTo(UtilisateurEnregistre::class, 'UtilisateurEnregistre');

    }
}
