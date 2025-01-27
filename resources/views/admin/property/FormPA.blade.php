@extends('layouts.base.baseEleve')

@section('title', $Parents->exists ? "Enregistrer un nouveau Parent" : "Enregistrer un parent")

@section('contenuEleve')

<h1>@yield('title')</h1>
<form action="{{ route($Parents->exists ? 'admin.Parent.update' : 'admin.Parent.store', $Parents)}}" method="POST">
    @csrf
    @method($Parents->exists ? 'put' : 'post')

    <div class="row">
        <div class="col">
            @include('share.imput',['class'=>'col', 'name'=>'nom', 'label'=>'nom', 'value'=>$personne->nom ?? ''])
            @include('share.imput',['class'=>'col', 'name'=>'prenom', 'label'=>'Prenom', 'value'=>$personne->prenom ?? ''])

        </div>
    </div>
    <div class="row">
        @include('share.imput',['class'=>'col', 'name'=>'email', 'label'=>'Email', 'value'=>$utilisateursEnregistres->email ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'role', 'label'=>'Role', 'value'=>$UtilisateursEnregistres->role ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'Mot_de_passe', 'label'=>'Mot de passe', 'value'=>$UtilisateursEnregistres->Mot_de_passe ?? ''])

    </div>

    <button class="btn btn-primary">
        @if ($Parents->exists)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
@endsection
