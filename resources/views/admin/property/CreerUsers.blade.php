@extends('layouts.base.baseAdmin')



@section( 'contenu')
<div class="container">
    <div class="row col-10 mx-auto gap-2">
        <a  href="{{ route('admin.Eleve.index') }}" class="btn btn-primary">Elève</a>
        <a href="{{ route('admin.Enseignant.index') }}" class="btn btn-primary">Enseignant</a>
        <a href="{{ route('admin.Parent.index') }}" class="btn btn-primary">Parent</a>
        <a href="{{ route('admin.Secretaire.index') }}" class="btn btn-primary">Secrétaire</a>
        <a href="{{ route('admin.Intendant.index') }}" class="btn btn-primary">Intendant</a>
        <a href="{{ route('admin.Directeur.index') }}" class="btn btn-primary">Directeur</a>
        <a href="{{ route('admin.Surveillant.index') }}" class="btn btn-primary">Surveillant</a>
    </div>
</div>

@endsection
