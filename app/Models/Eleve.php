<?php

// app/Models/Eleve.php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = ['INE', 'classe', 'utilisateurs_enregistres_id', 'date_de_naissance'];


    //Function to generate the unique code

    public function generateCode($annee, $sexe)
    {
        // Générer un nombre aléatoire de 6 chiffres
        $randomNumber = Str::random(6);

        // Formater le code comme suit : N + 6 chiffres + année + sexe
        return 'N' . substr($randomNumber, 0, 6) . $annee . strtoupper($sexe);
    }

    // Relation avec l'utilisateur
    public function utilisateurEnregistre()
    {
        return $this->belongsTo(UtilisateurEnregistre::class, 'utilisateur_enregistre_id');
    }

    public function parent()
    {
        return $this->hasMany(parentEleve::class, 'eleve_id');
    }
}
