<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Personne;
use App\Models\Personnes;
use App\Models\ParentEleve;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\UtilisateurEnregistre;
use App\Models\UtilisateursEnregistres;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\ParentFormRequest;

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
    public function store(ParentFormRequest $request)
    {

        $validated = $request->validated();
        dd($validated);
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

        $eleve= Eleve::create([
            'utilisateurs_enregistres_id'=>$utilisateursEnregistres->id,
        ]);

            ParentEleve::create([
            'eleve_id'=>$eleve->id,
        ]);



        return redirect()->route('admin.Parent.FormErPA')->with('succes', "l'eleve à été ajouté avec succès");
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
