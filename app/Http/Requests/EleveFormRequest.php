<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EleveFormRequest extends FormRequest
{
    public function rules(): array
{
    return [
        // Validation des informations utilisateur
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'classe' => 'required|integer|max:255',
        'date_de_naissance' => 'required|date',
        'Email' => 'required|email',
        'Mot_de_passe' => 'required|min:8',
        'role' => 'required|in:eleve, parent, enseignant, directeur, secretaire, intendant, surveillant',
        'sexe' => 'required|string', // Validation de l'attribut 'bureau' du secrétaire
    ];
}

public function messages(): array
{
    return [
        'nom.required' => 'Le nom est obligatoire.',
        'prenom.required' => 'Le prénom est obligatoire.',
        'Email.required' => 'L\'email est obligatoire.',
        'Mot_de_passe.required' => 'Le mot de passe est obligatoire.',
        'bureau.required' => 'Le bureau est obligatoire.',
        'role.required' => 'Le bureau est obligatoire.',
    ];
}
}
