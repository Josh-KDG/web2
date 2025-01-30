<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Models\UtilisateurEnregistre;
use App\Http\Requests\EnseignantFormRequest;
use App\Http\Requests\EnseignantFormResquests;

class EnseignantController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $Enseignants = Enseignant::with('utilisateurEnregistre.personne')->paginate(10);

            return view('admin.property.FormErES', compact('Enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property.FormES', [
            'Enseignants' => new Enseignant(),

        ], );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnseignantFormRequest $request)
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

            Enseignant::create([
                'Matiere' => $validated['Matiere'],
                'Intervention' => $validated['Intervention'],
                'utilisateur_enregistre_id' => $utilisateursEnregistres->id,
            ]);

            return redirect()->route('admin.Enseignant.index')->with('success', 'Le secrétaire a été ajouté avec succès.');
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
        $Enseignants = Enseignant::findOrFail($id);// 1. Récupérer l'élève par son ID.
        $UtilisateursEnregistres = $Enseignants->UtilisateursEnregistres;// 2. Charger les informations d'utilisateur enregistrées liées à cet élève.
        $UtilisateursEnregistres = UtilisateurEnregistre::findOrFail($id);// 3. Rechercher l'utilisateur enregistré par son ID.
        $personne = $UtilisateursEnregistres->personne;// 4. Charger les informations de la personne liée à cet utilisateur enregistré.
        return view('admin.property.FormES', compact('Secretaires','UtilisateursEnregistres', 'personne'));
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
