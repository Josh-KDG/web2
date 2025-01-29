<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use App\Models\Directeur;
use Illuminate\Http\Request;
use App\Models\UtilisateurEnregistre;
use App\Http\Requests\DirecteurFormRequest;

class DirecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $Directeurs = Directeur::with('utilisateurEnregistre.personne')->paginate(10);

            return view('admin.property.FormErDR', compact('Directeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property.FormDR', [
            'Directeurs' => new Directeur(),

        ], );
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(DirecteurFormRequest $request)
        {
            $validated = $request->validated();

            $personne= Personne::create([
                'nom'=>$validated['nom'],
                'prenom'=>$validated['prenom'],
            ]);

            $utilisateursEnregistres = UtilisateurEnregistre::create([
                'Mot_de_passe' => bcrypt($validated['Mot_de_passe']),
                'Email' => $validated['Email'],
                'personne_id' => $personne->id,
                'role' => $validated['role'],
            ]);

            Directeur::create([
                'utilisateur_enregistre_id' => $utilisateursEnregistres->id,
            ]);

            return redirect()->route('admin.Directeur.index')->with('success', 'Le secrétaire a été ajouté avec succès.');
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
    public function edit($id)
    {
        $Directeurs = Directeur::findOrFail($id);// 1. Récupérer l'élève par son ID.
        $UtilisateursEnregistres = $Directeurs->UtilisateursEnregistres;// 2. Charger les informations d'utilisateur enregistrées liées à cet élève.
        $UtilisateursEnregistres = UtilisateurEnregistre::findOrFail($id);// 3. Rechercher l'utilisateur enregistré par son ID.
        $personne = $UtilisateursEnregistres->personne;// 4. Charger les informations de la personne liée à cet utilisateur enregistré.
        return view('admin.property.FormSE', compact('Secretaires','UtilisateursEnregistres', 'personne'));
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
