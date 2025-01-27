<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Personne;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\UtilisateurEnregistre;
use App\Http\Requests\EleveFormRequest;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $Eleves = Eleve::with('utilisateursEnregistres.personne')->paginate(10);

            return view('admin.property.FormErEL', compact('Eleves'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property.FormEL', [
            'Eleves' => new Eleve(),

        ], );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EleveFormRequest $request)
    {

        $validated = $request->validated();


        $personne= Personne::create([
            'nom'=>$validated['nom'],
            'prenom'=>$validated['prenom'],
        ]);

        $utilisateursEnregistres= UtilisateurEnregistre::create([
           'Mot_de_passe' => bcrypt($validated['Mot_de_passe']),
                'Email'=>$validated['Email'],
                'personne_id'=>$personne->id,
                'role' => $validated['role'],
        ]);

        Eleve::create([
            'INE'=>$validated['INE'],
            'classe'=>$validated['classe'],
            'sexe'=>$validated['sexe'],
            'date_de_naissaince'=>$validated['date_de_naissaince'],
            'utilisateurs_enregistres_id'=>$utilisateursEnregistres->id,
        ]);



        return redirect()->route('admin.Eleve.index')->with('succes', "l'eleve à été ajouté avec succès");
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
        $Eleves = Eleve::findOrFail($id);// 1. Récupérer l'élève par son ID.
        $UtilisateursEnregistres = $Eleves->UtilisateursEnregistres;// 2. Charger les informations d'utilisateur enregistrées liées à cet élève.
        $UtilisateursEnregistres = UtilisateurEnregistre::findOrFail($id);// 3. Rechercher l'utilisateur enregistré par son ID.
        $personne = $UtilisateursEnregistres->personne;// 4. Charger les informations de la personne liée à cet utilisateur enregistré.
        return view('admin.property.FormEL', compact('Eleves', 'personne'));

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
