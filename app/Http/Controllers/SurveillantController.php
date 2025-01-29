<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use App\Models\Surveillant;
use Illuminate\Http\Request;
use App\Models\UtilisateurEnregistre;
use App\Http\Requests\SurveillantFormRequest;

class SurveillantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Surveillants = Surveillant::with('utilisateurEnregistre.personne')->paginate(10);

        return view('admin.property.FormErSU', compact('Surveillants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property.FormSU', [
            'Surveillants' => new Surveillant(),

        ], );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SurveillantFormRequest $request)
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

        Surveillant::create([
            'bureau' => $validated['bureau'],
            'utilisateur_enregistre_id' => $utilisateursEnregistres->id,
        ]);

        return redirect()->route('admin.Surveillant.index')->with('success', 'Le surveillant a été ajouté avec succès.');
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
