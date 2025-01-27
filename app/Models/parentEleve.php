<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentEleve extends Model
{
    use HasFactory;

    protected $fillable = ['eleve_id', 'utilisateurs_enregistres_id'];

    // Relation vers UtilisateurEnregistre
    public function utilisateurEnregistre()
    {
        return $this->belongsTo(UtilisateurEnregistre::class, 'utilisateur_enregistre_id');
    }

    // Relation vers Eleve
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'eleve_id');  // Correction ici
    }
}
