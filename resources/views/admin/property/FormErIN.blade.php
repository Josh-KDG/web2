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
            <th>Rôle</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Intendants as $Intendant)
        <tr>
            <td>{{ $Intendant->id }}</td>
            <td>{{ $Intendant->utilisateurEnregistre->personne->nom }}</td>
            <td>{{ $Intendant->utilisateurEnregistre->personne->prenom }}</td>
            <td>{{ $Intendant->bureau }}</td>
            <td>{{ $Intendant->utilisateurEnregistre->role }}</td>
            <td>{{ $Intendant->utilisateurEnregistre->Email }}</td>
            <td>
                <a href="{{ route('admin.Intendant.edit', $Surveillant->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('admin.Intendant.destroy', $Surveillant->id) }}" method="POST" style="display:inline;">
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
