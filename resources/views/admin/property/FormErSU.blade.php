@extends('layouts.base.baseEleve')

@section('title', "Tous les Surveillants enregistrés")

@section('contenuEleve')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.Surveillant.create') }}" class="btn btn-primary">Ajouter un Surveillant</a>
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
        @foreach ($Surveillants as $Surveillant)
        <tr>
            <td>{{ $Surveillant->id }}</td>
            <td>{{ $Surveillant->bureau }}</td>
            <td>{{ $Surveillant->utilisateurEnregistre->personne->nom }}</td>
            <td>{{ $Surveillant->utilisateurEnregistre->personne->prenom }}</td>
            <td>{{ $Surveillant->utilisateurEnregistre->email }}</td>
            <td>
                <a href="{{ route('admin.Surveillant.edit', $Surveillant->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('admin.Surveillant.destroy', $Surveillant->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $Surveillants->links() }}
@endsection
