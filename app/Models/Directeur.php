<?php

// app/Models/Directeur.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directeur extends Model
{
    use HasFactory;
    protected $fillable = ['utilisateur_enregistre_id'];

    public function utilisateurEnregistre()
    {
        return $this->belongsTo(UtilisateurEnregistre::class, 'utilisateur_enregistre_id');
    }
}
