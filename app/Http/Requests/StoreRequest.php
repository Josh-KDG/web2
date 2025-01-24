<?php
// app/Http/Requests/StoreRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [];

        // Validation pour les élèves
        if ($this->is('eleve/*')) {
            $rules = array_merge($rules, [
                'INE' => 'required|unique:eleves',
                'Sexe' => 'required|in:M,F',
                'classe' => 'required|in:6,5,4,3,2,1,tle',
                'date_de_naissance' => 'required|date',
                'utilisateur_enregistre_id' => 'required|exists:utilisateurs_enregistres,id',
                'utilisateurs_enregistres.personne.nom' => 'required|string|max:255', // Validation pour le nom
                'utilisateurs_enregistres.personne.prenom' => 'required|string|max:255', // Validation pour le prénom
                'utilisateurs_enregistres.Email' => 'required|email',
                'utilisateurs_enregistres.Mot_de_passe' => 'required|min:8',
                'utilisateurs_enregistres.role' => 'required|in:eleve, parent, enseignant, directeur, secretaire, intendant, surveillant',
            ]);
        }

        // Validation pour les parents d'élèves
        if ($this->is('parent_eleves/*')) {
            $rules = array_merge($rules, [
                'utilisateur_enregistre_id' => 'required|exists:utilisateurs_enregistres,id',
                'eleve_id' => 'required|exists:eleves,id',
                'utilisateurs_enregistres.personne.nom' => 'required|string|max:255', // Validation pour le nom
                'utilisateurs_enregistres.personne.prenom' => 'required|string|max:255', // Validation pour le prénom
                'utilisateurs_enregistres.Email' => 'required|email',
                'utilisateurs_enregistres.Mot_de_passe' => 'required|min:8',
                'utilisateurs_enregistres.role' => 'required|in:eleve, parent, enseignant, directeur, secretaire, intendant, surveillant',

            ]);
        }

        // Validation pour les surveillants
        if ($this->is('surveillants/*')) {
            $rules = array_merge($rules, [
                'bureau' => 'required|integer',
                'utilisateurs_enregistres_id' => 'required|exists:utilisateurs_enregistres,id',
                'utilisateurs_enregistres.personne.nom' => 'required|string|max:255', // Validation pour le nom
                'utilisateurs_enregistres.personne.prenom' => 'required|string|max:255', // Validation pour le prénom
                'utilisateurs_enregistres.Email' => 'required|email',
                'utilisateurs_enregistres.Mot_de_passe' => 'required|min:8',
                'utilisateurs_enregistres.role' => 'required|in:eleve, parent, enseignant, directeur, secretaire, intendant, surveillant',

            ]);
        }

        // Validation pour les intendants
        if ($this->is('Intendant/*')) {
            $rules = array_merge($rules, [
                'bureau' => 'required|integer',
                'utilisateurs_enregistres_id' => 'required|exists:utilisateurs_enregistres,id',
                'utilisateurs_enregistres.personne.nom' => 'required|string|max:255', // Validation pour le nom
                'utilisateurs_enregistres.personne.prenom' => 'required|string|max:255', // Validation pour le prénom
                'utilisateurs_enregistres.Email' => 'required|email',
                'utilisateurs_enregistres.Mot_de_passe' => 'required|min:8',
                'utilisateurs_enregistres.role' => 'required|in:eleve, parent, enseignant, directeur, secretaire, intendant, surveillant',

            ]);
        }

        // Validation pour les secrétaires
        if ($this->is('Secretaire/*')) {
            $rules = array_merge($rules, [
                'bureau' => 'required|integer',
                'utilisateurs_enregistres_id' => 'required|exists:utilisateurs_enregistres,id',
                'utilisateurs_enregistres.personne.nom' => 'required|string|max:255', // Validation pour le nom
                'utilisateurs_enregistres.personne.prenom' => 'required|string|max:255', // Validation pour le prénom
                'utilisateurs_enregistres.Email' => 'required|email',
                'utilisateurs_enregistres.Mot_de_passe' => 'required|min:8',
                'utilisateurs_enregistres.role' => 'required|in:eleve, parent, enseignant, directeur, secretaire, intendant, surveillant',

            ]);
        }

        // Validation pour les directeurs
        if ($this->is('Directeur/*')) {
            $rules = array_merge($rules, [
                'utilisateurs_enregistres_id' => 'required|exists:utilisateurs_enregistres,id',
                'utilisateurs_enregistres.personne.nom' => 'required|string|max:255', // Validation pour le nom
                'utilisateurs_enregistres.personne.prenom' => 'required|string|max:255', // Validation pour le prénom
                'utilisateurs_enregistres.Email' => 'required|email',
                'utilisateurs_enregistres.Mot_de_passe' => 'required|min:8',
                'utilisateurs_enregistres.role' => 'required|in:eleve, parent, enseignant, directeur, secretaire, intendant, surveillant',

            ]);
        }

        return $rules;
    }
}

