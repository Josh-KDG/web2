@extends('layouts.base.baseEleve')

@section('title', "Tous les Secretaires enregistrés")

@section('contenuEleve')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.Enseignant.create') }}" class="btn btn-primary">Ajouter un Enseignant</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Rôle</th>
            <th>Matiere</th>
            <th>Salles d'intervention</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Enseignants as $Enseignant)
        <tr>
            <td>{{ $Enseignant->id }}</td>
            <td>{{ $Enseignant->utilisateurEnregistre->personne->nom }}</td>
            <td>{{ $Enseignant->utilisateurEnregistre->personne->prenom }}</td>
            <td>{{ $Enseignant->utilisateurEnregistre->role }}</td>
            <td>{{ $Enseignant->Matiere }}</td>
            <td>{{ $Enseignant->Intervention }}</td>
            <td>{{ $Enseignant->utilisateurEnregistre->Email }}</td>
            <td>
                <a href="{{ route('admin.Enseignant.edit', $Enseignant->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('admin.Enseignant.destroy', $Enseignant->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $Enseignants->links() }}
@endsection
