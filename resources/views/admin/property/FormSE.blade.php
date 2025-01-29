
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
             @include('share.imput',['class'=>'col', 'name'=>'bureau', 'label'=>'Bureau', 'value'=>$Secretaires->bureau ?? ''])
             @include('share.imput',['class'=>'col', 'name'=>'email', 'label'=>'Email', 'value'=>$UtilisateursEnregistres->email ?? ''])
         </div>

         <div class="row">
             @include('share.imput',['class'=>'col', 'name'=>'role', 'label'=>'Role', 'value'=>$UtilisateursEnregistres->role ?? ''])
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
