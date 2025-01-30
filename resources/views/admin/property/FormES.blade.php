@extends('layouts.base.baseEleve')

@section('title', $Enseignants->exists ? "Enregistrer un nouveau Enseignant" : "Enregistrer un Enseignant")

@section('contenuEleve')

<h1>@yield('title')</h1>
<form action="{{ route($Enseignants->exists ? 'admin.Enseignant.update' : 'admin.Enseignant.store', $Enseignants)}}" method="POST">
    @csrf
    @method($Enseignants->exists ? 'put' : 'post')

    <div class="row">
        <div class="col">
            @include('share.imput',['class'=>'col', 'name'=>'nom', 'label'=>'Nom', 'value'=>$personne->nom ?? ''])
            @include('share.imput',['class'=>'col', 'name'=>'prenom', 'label'=>'Prénom', 'value'=>$personne->prenom ?? ''])
        </div>
    </div>


    <div class="row">
        <div class="col">
            <label for="role">Rôle</label>
                <select name="role" id="role" class="form-control">
                <option value="eleve" {{ isset($UtilisateursEnregistres) && $UtilisateursEnregistres->role === 'eleve' ? 'selected' : '' }}>Élève</option>
                <option value="parent" {{ isset($UtilisateursEnregistres) && $UtilisateursEnregistres->role === 'parent' ? 'selected' : '' }}>Parent</option>
                <option value="enseignant" {{ isset($UtilisateursEnregistres) && $UtilisateursEnregistres->role === 'enseignant' ? 'selected' : '' }}>Enseignant</option>
                <option value="directeur" {{ isset($UtilisateursEnregistres) && $UtilisateursEnregistres->role === 'directeur' ? 'selected' : '' }}>Directeur</option>
                <option value="secretaire" {{ isset($UtilisateursEnregistres) && $UtilisateursEnregistres->role === 'secretaire' ? 'selected' : '' }}>Secretaire</option>
                <option value="intendant" {{ isset($UtilisateursEnregistres) && $UtilisateursEnregistres->role === 'intendant' ? 'selected' : '' }}>Intendant</option>

            </select>
        </div>

        @include('share.imput',['class'=>'col', 'name'=>'Intervention', 'label'=>'Intervention', 'value'=>$Enseignant->Intervention ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'Matiere', 'label'=>'Matière', 'value'=>$Enseignant->Matiere ?? ''])
    </div>

    <div class="row">
        @include('share.imput',['class'=>'col', 'name'=>'Email', 'label'=>'Email', 'value'=>$personne->Email ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'Mot_de_passe', 'label'=>'Mot de passe', 'value'=>$UtilisateursEnregistres->Mot_de_passe ?? ''])
    </div>

    <button class="btn btn-primary">
        @if ($Enseignants->exists)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
@endsection
