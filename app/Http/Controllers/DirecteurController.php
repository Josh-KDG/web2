<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Personne;
use App\Models\Directeur;
use App\Models\Intendant;
use App\Models\Personnes;
use App\Models\Secretaire;
use App\Models\parentEleve;
use App\Models\Surveillant;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\UtilisateurEnregistre;
use Illuminate\Auth\Events\Validated;
use App\Models\UtilisateursEnregistres;
use App\Http\Requests\admin\UsersFormRequest;

class DirecteurController extends Controller
{

    public function index()
    {

        $Directeurs = Directeur::with('utilisateursEnregistres.personne')->paginate(10);

        return view('admin.property.FormErDR', compact('Directeurs'));
    }

    public function create()
    {
        return view('admin.property.FormDR', [
            'Directeurs' => new Directeur(),

        ], );
    }







    public function editPA($id)
    {
        $Parents = Parent::findOrFail($id);
        $UtilisateursEnregistres = UtilisateurEnregistre::findOrFail($id);// 3. Rechercher l'utilisateur enregistré par son ID.
        $Eleves = Eleve::findOrFail($id);// 3. Rechercher l'utilisateur enregistré par son ID.
        $UtilisateursEnregistres = $Parents->utilisateursEnregistres;
        $Eleves = $Parents->Eleves;
        $personne = $UtilisateursEnregistres->personne;
        $personne = $Eleves->personne;


        return view('admin.property.FormPA', compact('Parents', 'personne'));
    }



    public function editDR($id)
    {
        $Directeurs = Directeur::findOrFail($id);// 1. Récupérer l'élève par son ID.
        $UtilisateursEnregistres = $Directeurs->UtilisateursEnregistres;// 2. Charger les informations d'utilisateur enregistrées liées à cet élève.
        $UtilisateursEnregistres = UtilisateurEnregistre::findOrFail($id);// 3. Rechercher l'utilisateur enregistré par son ID.
        $personne = $UtilisateursEnregistres->personne;// 4. Charger les informations de la personne liée à cet utilisateur enregistré.
        return view('admin.property.FormDR', compact('Eleves', 'personne'));
    }
    public function editSU($id)
    {
        $Surveillants = Surveillant::findOrFail($id);// 1. Récupérer l'élève par son ID.
        $UtilisateursEnregistres = $Surveillants->UtilisateursEnregistres;// 2. Charger les informations d'utilisateur enregistrées liées à cet élève.
        $UtilisateursEnregistres = UtilisateurEnregistre::findOrFail($id);// 3. Rechercher l'utilisateur enregistré par son ID.
        $personne = $UtilisateursEnregistres->personne;// 4. Charger les informations de la personne liée à cet utilisateur enregistré.
        return view('admin.property.FormSU', compact('Eleves', 'personne'));
    }
    public function editIN($id)
    {
        $Intendants = Intendant::findOrFail($id);// 1. Récupérer l'élève par son ID.
        $UtilisateursEnregistres = $Intendants->UtilisateursEnregistres;// 2. Charger les informations d'utilisateur enregistrées liées à cet élève.
        $UtilisateursEnregistres = UtilisateurEnregistre::findOrFail($id);// 3. Rechercher l'utilisateur enregistré par son ID.
        $personne = $UtilisateursEnregistres->personne;// 4. Charger les informations de la personne liée à cet utilisateur enregistré.
        return view('admin.property.FormIN', compact('Eleves', 'personne'));
    }
    public function editSE($id)
    {
        $Secretaires = Secretaire::findOrFail($id);// 1. Récupérer l'élève par son ID.
        $UtilisateursEnregistres = $Secretaires->UtilisateursEnregistres;// 2. Charger les informations d'utilisateur enregistrées liées à cet élève.
        $UtilisateursEnregistres = UtilisateurEnregistre::findOrFail($id);// 3. Rechercher l'utilisateur enregistré par son ID.
        $personne = $UtilisateursEnregistres->personne;// 4. Charger les informations de la personne liée à cet utilisateur enregistré.
        return view('admin.property.FormSE', compact('Eleves', 'personne'));
    }


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
