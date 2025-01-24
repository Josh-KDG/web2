<?php

// app/Models/Personne.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom'];

    // Relation avec l'utilisateur enregistré
    public function UtilisateurEnregistre()
    {
        return $this->hasOne(UtilisateurEnregistre::class); // Un utilisateur par personne
    }
}
