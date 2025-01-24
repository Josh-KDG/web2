<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use App\Models\Secretaire;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\UtilisateurEnregistre;
use App\Http\Requests\SecretaireFormRequest;

class SecretaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $Secretaires = Secretaire::with('utilisateurEnregistre.personne')->paginate(10);

            return view('admin.property.FormErSE', compact('Secretaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property.FormSE', [
            'Secretaires' => new Secretaire(),

        ], );
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(SecretaireFormRequest $request)
        {
            $validated = $request->validated(); // Récupère les données validées

            // Création de la personne
            $personne = Personne::create([
                'nom' => $validated['utilisateurs_enregistres']['personne']['nom'],
                'prenom' => $validated['utilisateurs_enregistres']['personne']['prenom'],
            ]);

            // Création de l'utilisateur enregistré (associé à la personne)
            $utilisateursEnregistres = UtilisateurEnregistre::create([
                'Email' => $validated['utilisateurs_enregistres']['Email'],
                'Mot_de_passe' => bcrypt($validated['utilisateurs_enregistres']['Mot_de_passe']),
                'personne_id' => $personne->id,
                'role' => $validated['utilisateurs_enregistres']['role'], // Ajoute le rôle de l'utilisateur
            ]);

            // Création du secrétaire
            Secretaire::create([
                'bureau' => $validated['Secretaire']['bureau'],
                'utilisateurs_enregistres_id' => $utilisateursEnregistres->id, // L'ID de l'utilisateur enregistré
            ]);

            return redirect()->route('admin.Secretaire.index')->with('success', 'Le secrétaire a été ajouté avec succès.');
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
