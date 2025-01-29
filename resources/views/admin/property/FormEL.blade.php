@extends('layouts.base.baseEleve')

@section('title', $Eleves->exists ? "Enregistrer un nouveau utilisateur" : "Enregistrer un utilisateur")

@section('contenuEleve')

<h1>@yield('title')</h1>
<form action="{{ route($Eleves->exists ? 'admin.Eleve.update' : 'admin.Eleve.store', $Eleves)}}" method="POST">
    @csrf
    @method($Eleves->exists ? 'put' : 'post')

    <div class="row">
        <div class="col">
            @include('share.imput',['class'=>'col', 'name'=>'nom', 'label'=>'nom', 'value'=>$personne->nom ?? ''])
            @include('share.imput',['class'=>'col', 'name'=>'prenom', 'label'=>'Prenom', 'value'=>$personne->prenom ?? ''])

        </div>
    </div>

    <div class="row">
        @include('share.imput',['class'=>'col', 'name'=>'date_de_naissance', 'label'=>'Date de naissance', 'value'=>$Eleves->date_de_naissaince ?? ''])
        @include('share.imput', ['class' => 'col', 'name' => 'sexe', 'label' => 'Sexe', 'value' => $Eleves->sexe ?? ''])
    </div>
    <div class="row">
        @include('share.imput',['class'=>'col', 'name'=>'classe', 'label'=>'Classe', 'value'=>$Eleves->classe ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'Email', 'label'=>'Email', 'value'=>$personne->email ?? ''])
    </div>

    <div class="row">
        @include('share.imput',['class'=>'col', 'name'=>'role', 'label'=>'Role', 'value'=>$UtilisateursEnregistres->role ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'Mot_de_passe', 'label'=>'Mot de passe', 'value'=>$UtilisateursEnregistres->Mot_de_passe ?? ''])

    </div>

    <button class="btn btn-primary">
        @if ($Eleves->exists)
            Modifier
        @else
            Créer
        @endif
    </button>

</form>

@endsection
