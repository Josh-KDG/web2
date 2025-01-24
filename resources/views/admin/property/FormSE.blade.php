@extends('layouts.base.baseEleve')
@section('title', $Secretaires->exists ? "Modifier un Secrétaire" : "Ajouter un Secrétaire")
@section ('contenuEleve')
<h1>@yield('title')</h1>
<form action="{{ route($Secretaires->exists ? 'admin.Secretaire.update' : 'admin.Secretaire.store', $Secretaires)}}" method="POST">
     @csrf
      @method($Secretaires->exists ? 'put' : 'post')
    <div classe="row">
        <div class="col">
            @include('share.imput',['class'=>'col', 'name'=>'utilisateurs_enregistres[personne][nom]', 'label'=>'Nom', 'value'=>$Secretaires->utilisateurEnregistre->personne->nom ?? ''])
            @include('share.imput',['class'=>'col', 'name'=>'utilisateurs_enregistres[personne][prenom]', 'label'=>'Prénom', 'value' =>$Secretaires->utilisateurEnregistre->personne->prenom ?? ''])
        </div>
    </div>
    <div class="row">
        @include('share.imput',['class'=>'col', 'name'=>'Secretaire[bureau]', 'label'=>'Bureau', 'value'=>$Secretaires->bureau ?? '']) @include('share.imput',['class'=>'col', 'name'=>'utilisateurs_enregistres[Email]', 'label'=>'Email', 'value'=>$Secretaires->utilisateurEnregistre->email ?? ''])
         @include('share.imput',['class'=>'col', 'name'=>'utilisateurs_enregistres[Mot_de_passe]', 'label'=>'Mot de passe', 'value'=>$Secretaires->utilisateurEnregistre->Mot_de_passe ?? ''])
         @include('share.imput',['class'=>'col', 'name'=>'utilisateurs_enregistres[role]', 'label'=>'Rôle', 'value'=>$Secretaires->utilisateurEnregistre->role ?? ''])
        </div>
        <button class="btn btn-primary">
            @if ($Secretaires->exists)
            Modifier
            @else
            Créer
            @endif
        </button>
     </form>
     @endsection
