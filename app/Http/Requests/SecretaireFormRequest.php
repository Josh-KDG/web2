<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecretaireFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Si tu veux autoriser tous les utilisateurs à accéder à cette route, retourne true
        // Sinon, tu peux vérifier une condition ici, par exemple si l'utilisateur est un administrateur
        return true;
    }

    public function rules(): array
    {
        return [
            // Validation des informations utilisateur
            'utilisateurs_enregistres.personne.nom' => 'required|string|max:255',
            'utilisateurs_enregistres.personne.prenom' => 'required|string|max:255',
            'utilisateurs_enregistres.Email' => 'required|email',
            'utilisateurs_enregistres.Mot_de_passe' => 'required|min:8',
            'utilisateurs_enregistres.role' => 'required|in:eleve, parent, enseignant, directeur, secretaire, intendant, surveillant',

            // Validation spécifique au secrétaire
            'Secretaire.bureau' => 'required|integer|max:2', // Validation de l'attribut 'bureau' du secrétaire
        ];
    }

    public function messages(): array
    {
        return [
            'utilisateurs_enregistres.personne.nom.required' => 'Le nom est obligatoire.',
            'utilisateurs_enregistres.personne.prenom.required' => 'Le prénom est obligatoire.',
            'utilisateurs_enregistres.Email.required' => 'L\'email est obligatoire.',
            'utilisateurs_enregistres.Mot_de_passe.required' => 'Le mot de passe est obligatoire.',
            'Secretaire.bureau.required' => 'Le bureau est obligatoire.',
        ];
    }
}
