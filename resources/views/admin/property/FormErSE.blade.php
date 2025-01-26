@extends('layouts.base.baseEleve')

@section('title', "Tous les Secretaires enregistrés")

@section('contenuEleve')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.Secretaire.create') }}" class="btn btn-primary">Ajouter un Secretaire</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Bureau</th>
            <th>Rôle</th>
            <th>Email</th>
            <th>Mot de passe</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Secretaires as $Secretaire)
        <tr>
            <td>{{ $Secretaire->id }}</td>
            <td>{{ $Secretaire->UtilisateurEnregistre->personne->nom }}</td>
            <td>{{ $Secretaire->UtilisateurEnregistre->personne->prenom }}</td>
            <td>{{ $Secretaire->bureau }}</td>
            <td>{{ $Secretaire->UtilisateurEnregistre->role }}</td>
            <td>{{ $Secretaire->UtilisateurEnregistre->Email }}</td>
            <td>{{ $Secretaire->UtilisateurEnregistre->Mot_de_passe }}</td>
            <td>
                <a href="{{ route('admin.Secretaire.edit', $Secretaire->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('admin.Directeur.destroy', $Secretaire->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $Secretaires->links() }}
@endsection
