@extends('layouts.base.baseEleve')

@section('title', "Tous les Intendants enregistrés")

@section('contenuEleve')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.Intendant.create') }}" class="btn btn-primary">Ajouter un Intendant</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Bureau</th>
            <th>Email</th>
            <th>Mot de passe</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Intendants as $Intendant)
        <tr>
            <td>{{ $Intendant->id }}</td>
            <td>{{ $Intendant->utilisateurEnregistre->personne->nom }}</td>
            <td>{{ $Intendant->utilisateurEnregistre->personne->prenom }}</td>
            <td>{{ $Intendant->utilisateurEnregistre->email }}</td>
            <td>
                <a href="{{ route('admin.Directeur.edit', $Intendant->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('admin.Directeur.destroy', $Intendant->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $Intendants->links() }}
@endsection
