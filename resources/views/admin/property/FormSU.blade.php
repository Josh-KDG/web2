@extends('layouts.base.baseEleve')

@section('title', $Surveillants->exists ? "Enregistrer un nouveau Surveillant" : "Enregistrer un Surveillant")

@section('contenuEleve')

<h1>@yield('title')</h1>
<form action="{{ route($Surveillants->exists ? 'admin.Parent.update' : 'admin.Parent.store', $Directeurs)}}" method="POST">
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
        @if ($Directeurs->exists)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
@endsection
