@extends('layouts.base.baseEleve')

@section('title', $Directeurs->exists ? "Enregistrer un nouveau Directeur" : "Enregistrer un Directeur")

@section('contenuEleve')

<h1>@yield('title')</h1>
<form action="{{ route($Directeurs->exists ? 'admin.Directeur.update' : 'admin.Directeur.store', $Directeurs)}}" method="POST">
    @csrf
    @method($Directeurs->exists ? 'put' : 'post')

    <div class="row">
        <div class="col">
            @include('share.imput',['class'=>'col', 'name'=>'nom', 'label'=>'nom', 'value'=>$personne->nom ?? ''])
            @include('share.imput',['class'=>'col', 'name'=>'prenom', 'label'=>'Prenom', 'value'=>$personne->prenom ?? ''])

        </div>
    </div>

    <div class="row">
        @include('share.imput',['class'=>'col', 'name'=>'Email', 'label'=>'Email', 'value'=>$personne->email ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'Mot_de_passe', 'label'=>'Mot de passe', 'value'=>$UtilisateursEnregistres->Mot_de_passe ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'role', 'label'=>'Role', 'value'=>$UtilisateursEnregistres->role ?? ''])
    </div>

    <button class="btn btn-primary">
        @if ($Directeurs->exists)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
@endsection
