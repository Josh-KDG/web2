<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnseignantFormRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'Email' => 'required|email',
            'Mot_de_passe' => 'required|min:8',
            'role' => 'required|in:eleve, parent, enseignant, directeur, secretaire, intendant, surveillant',

            'Matiere' => 'required|string|max:20', // Validation de l'attribut 'bureau' du secrétaire
            'Intervention' => 'required|string|max:10',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'Email.required' => 'L\'email est obligatoire.',
            'Mot_de_passe.required' => 'Le mot de passe est obligatoire.',
            'Matiere.required' => 'Le bureau est obligatoire.',
            'role.required' => 'Le bureau est obligatoire.',
            'Intervention.required' => 'Les salles d\'intervention sont obligatoires.',
        ];
    }
}
