@extends('layouts.base.baseEleve')

@section('title', $Surveillants->exists ? "Enregistrer un nouveau Directeur" : "Enregistrer un Surveillant")

@section('contenuEleve')

<h1>@yield('title')</h1>
<form action="{{ route($Surveillants->exists ? 'admin.Surveillant.update' : 'admin.Surveillant.store', $Surveillants)}}" method="POST">
    @csrf
    @method($Surveillants->exists ? 'put' : 'post')

    <div class="row">
        <div class="col">
            @include('share.imput',['class'=>'col', 'name'=>'nom', 'label'=>'nom', 'value'=>$personne->nom ?? ''])
            @include('share.imput',['class'=>'col', 'name'=>'prenom', 'label'=>'Prenom', 'value'=>$personne->prenom ?? ''])

        </div>
    </div>
    <div class="row">
        @include('share.imput',['class'=>'col', 'name'=>'Email', 'label'=>'Email', 'value'=>$personne->email ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'Mot_de_passe', 'label'=>'Mot de passe', 'value'=>$UtilisateursEnregistres->Mot_de_passe ?? ''])

    </div>

    <button class="btn btn-primary">
        @if ($Surveillants->exists)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
@endsection
