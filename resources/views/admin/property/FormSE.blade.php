@extends('layouts.base.baseEleve')
@section('title', $Secretaires->exists ? "Modifier un Secrétaire" : "Ajouter un Secrétaire")
@section ('contenuEleve')
<h1>@yield('title')</h1>
<form action="{{ route($Secretaires->exists ? 'admin.Secretaire.update' : 'admin.Secretaire.store', $Secretaires)}}" method="POST">
     @csrf
      @method($Secretaires->exists ? 'put' : 'post')
    <div classe="row">
        <div class="col">
            @include('share.imput',['class'=>'col', 'name'=>'utilisateurs_enregistres[personne][nom]', 'label'=>'Nom', 'value'=>$Secretaires->utilisateursEnregistres->personne->nom ?? ''])
            @include('share.imput',['class'=>'col', 'name'=>'utilisateurs_enregistres[personne][prenom]', 'label'=>'Prénom', 'value' =>$Secretaires->utilisateursEnregistres->Personne->prenom ?? ''])
        </div>
    </div>
    <div class="row">
        @include('share.imput',['class'=>'col', 'name'=>'secretaires[bureau]', 'label'=>'Bureau', 'value'=>$Secretaires->bureau ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'utilisateurs_enregistres[Email]', 'label'=>'Email', 'value'=>$Secretaires->utilisateursEnregistres->email ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'utilisateurs_enregistres[Mot_de_passe]', 'label'=>'Mot de passe', 'value'=>$Secretaires->utilisateursEnregistres->Mot_de_passe ?? ''])
        @include('share.imput',['class'=>'col', 'name'=>'utilisateurs_enregistres[role]', 'label'=>'Rôle', 'value'=>$Secretaires->utilisateursEnregistres->role ?? ''])
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
     @extends('layouts.base.baseEleve')

     @section('title', $Secretaires->exists ? "Enregistrer un nouveau utilisateur" : "Enregistrer un utilisateur")

     @section('contenuEleve')

     <h1>@yield('title')</h1>
     <form action="{{ route($Secretaires->exists ? 'admin.Secretaire.update' : 'admin.Secretaire.store', $Secretaires)}}" method="POST">
        @csrf
         @method($Secretaires->exists ? 'put' : 'post')

         <div class="row">
             <div class="col">
                 @include('share.imput',['class'=>'col', 'name'=>'nom', 'label'=>'nom', 'value'=>$personne->nom ?? ''])
                 @include('share.imput',['class'=>'col', 'name'=>'prenom', 'label'=>'Prenom', 'value'=>$personne->prenom ?? ''])
             </div>
         </div>

         <div class="row">
             @include('share.imput',['class'=>'col', 'name'=>'classe', 'label'=>'Classe', 'value'=>$Secretaires->bureau ?? ''])
             @include('share.imput',['class'=>'col', 'name'=>'Email', 'label'=>'Email', 'value'=>$utilisateursEnregistres->email ?? ''])
         </div>

         <div class="row">
             @include('share.imput',['class'=>'col', 'name'=>'INE', 'label'=>'INE', 'value'=>$utilisateursEnregistres->role ?? ''])
             @include('share.imput',['class'=>'col', 'name'=>'Mot_de_passe', 'label'=>'Mot de passe', 'value'=>$UtilisateursEnregistres->Mot_de_passe ?? ''])
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
