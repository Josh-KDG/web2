<!-- resources/views/eleves/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des Élèves') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nom</th>
                                <th class="px-4 py-2">Classe</th>
                                <th class="px-4 py-2">INE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eleves as $eleve)
                                <tr>
                                    <td class="px-4 py-2">{{ $eleve->utilisateursEnregistres->personne->nom }} {{ $eleve->utilisateursEnregistres->personne->prenom }}</td>
                                    <td class="px-4 py-2">{{ $eleve->classe }}</td>
                                    <td class="px-4 py-2">{{ $eleve->INE }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
