<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Personne;
use App\Models\Personnes;
use App\Models\ParentEleve;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\UtilisateurEnregistre;
use App\Models\UtilisateursEnregistres;
use App\Http\Requests\admin\ParentFormRequest;

class ParentController extends Controller
{
    public function index()
    {
        // Récupérer les parents avec leurs utilisateurs enregistrés et personnes associés
        $Parents = parentEleve::with(['utilisateursEnregistres.personne', 'eleve'])->paginate(10);

        return view('admin.property.FormErPA', compact('Parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property.FormPA', [
            'Parents' => new ParentEleve(),

        ], );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $validated = $request->validated();


        $personne= Personne::create([
            'nom'=>$validated['nom'],
            'prenom'=>$validated['prenom'],
        ]);

        $utilisateursEnregistres= UtilisateurEnregistre::create([
            'email'=>$validated['Email'],
            'Mot_de_passe' => bcrypt($validated['Mot_de_passe']),
            'personne_id'=>$personne->id,
        ]);

        $eleve= Eleve::create([
            'utilisateurs_enregistres_id'=>$utilisateursEnregistres->id,
        ]);

            ParentEleve::create([
            'eleve_id'=>$eleve->id,
        ]);



        return redirect()->route('admin.Parent.index')->with('succes', "l'eleve à été ajouté avec succès");
    }


    public function edit($id)
    {
        $Parents = ParentEleve::findOrFail($id);
        $UtilisateursEnregistres = $Parents->UtilisateursEnregistres; // On récupère la personne associée à l'élève
        $UtilisateursEnregistres = UtilisateurEnregistre::findOrFail($id);
        $personne = $UtilisateursEnregistres->personne; // On récupère la personne associée à l'élève
        return view('admin.property.FormPA', compact('Parents'));
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
