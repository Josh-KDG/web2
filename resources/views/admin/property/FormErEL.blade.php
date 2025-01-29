@extends('layouts.base.baseEleve')

@section('title', 'Tous les élèves du lycée')

@section('contenuEleve')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.Eleve.create') }}" class="btn btn-primary">Ajouter un élève</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Classe</th>
            <th>INE</th>
            <th>Date de naissance</th>
            <th>Sexe</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Eleves as $Eleve)
        <tr>
            <td>{{ $Eleve->id }}</td>
            <td>{{ $Eleve->utilisateurEnregistre->personne->nom }}</td>
            <td>{{ $Eleve->utilisateurEnregistre->personne->prenom }}</td>
            <td>{{ $Eleve->classe }}</td>
            <td>{{ $Eleve->utilisateurEnregistre->Email }}</td>
            <td>{{ $Eleve->date_de_naissance }}</td>
            <td>{{ $Eleve->Sexe }}</td> <!-- Afficher le sexe de l'élève -->
            <td>
                <a href="{{ route('admin.Eleve.edit', $Eleve->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('admin.Eleve.destroy', $Eleve->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


{{ $Eleves->links() }}
@endsection
