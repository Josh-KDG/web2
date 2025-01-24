@extends('layouts.base.baseEleve')

@section('title', "Tous les directeurs enregistrés")

@section('contenuEleve')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.Directeur.create') }}" class="btn btn-primary">Ajouter un Directeur</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Mot de passe</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Directeurs as $Directeur)
        <tr>
            <td>{{ $Directeur->id }}</td>
            <td>{{ $Directeur->utilisateurEnregistre->personne->nom }}</td>
            <td>{{ $Directeur->utilisateurEnregistre->personne->prenom }}</td>
            <td>{{ $Directeur->utilisateurEnregistre->email }}</td>
            <td>
                <a href="{{ route('admin.Directeur.edit', $eleve->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('admin.Directeur.destroy', $eleve->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $Directeurs->links() }}
@endsection
