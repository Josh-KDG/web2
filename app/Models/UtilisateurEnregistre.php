<?php



// app/Models/UtilisateurEnregistre.php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilisateurEnregistre extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait; // Ajoute le trait

    protected $table = 'utilisateurs_enregistres';

    protected $fillable = ['Mot_de_passe', 'Email', 'personne_id', 'role'];

    protected $hidden = [
        'Mot_de_passe', 'remember_token',
    ];




    // Ajouter l'attribut qui est utilisé pour l'authentification
    public function getAuthIdentifierName()
    {
        return 'Email'; // Le champ à utiliser pour l'authentification
    }

    // Ajouter la méthode de récupération du mot de passe
    public function getAuthPassword()
    {
        return $this->Mot_de_passe; // Le champ du mot de passe
    }

    // Ajouter la méthode pour l'email
    public function getEmailForVerification()
    {
        return $this->Email;
    }

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }

    public function eleve()
    {
        return $this->hasOne(Eleve::class);
    }
    public function parent()
    {
        return $this->hasMany(parentEleve::class, 'utilisateur_enregistre_id');
    }
    public function directeur()
    {
        return $this->hasOne(Directeur::class);
    }
    public function secretaire()
    {
        return $this->hasOne(Secretaire::class);
    }
    public function surveillant()
    {
        return $this->hasOne(Surveillant::class);
    }
    public function intendant()
    {
        return $this->hasOne(Intendant::class);
    }
}

/*
// app/Models/UtilisateurEnregistre.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilisateurEnregistre extends Model
{
    use HasFactory;
    protected $table = 'utilisateurs_enregistres';
    protected $fillable = ['mot_de_passe', 'email','personne_id', 'role'];

    protected $hidden = [
        'Mot_de_passe', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Si vous avez un attribut "email" personnalisé
    public function getEmailForVerification()
    {
        return $this->Email;
    }

    // Relations
    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }
    // Relation avec les rôles via la table pivot role_user
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // Lien avec les messages envoyés ou reçus
    public function messagesEnvoyes()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function messagesRecus()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    // Lien avec les réclamations
    public function reclamations()
    {
        return $this->hasMany(Reclamation::class);
    }

}

*/
