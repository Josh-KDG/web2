@extends('layouts.base.baseEleve')

@section('title', "Tous les Parents d/'eleves")

@section('contenuEleve')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.Parent.create') }}" class="btn btn-primary">Ajouter un Parent d'éleve</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Id Enfant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Mot de passe</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Parents as $Parent)
        <tr>
            <td>{{ $Parent->id }}</td>
            <td>{{ $Parent->Eleve->id }}</td>
            <td>{{ $Parent->UtilisateurEnregistre->personne->nom }}</td>
            <td>{{ $Parent->UtilisateurEnregistre->personne->prenom }}</td>
            <td>{{ $Parent->UtilisateurEnregistre->email }}</td>
            <td>{{ $Parent->UtilisateurEnregistre->Mot_de_passe }}</td>
            <td>
                <a href="{{ route('admin.Parent.edit', $Parent->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('admin.Parent.destroy', $Parent->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $Parents->links() }}
@endsection
