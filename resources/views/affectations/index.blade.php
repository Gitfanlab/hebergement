<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ $profil->nom }} : {{ __('Liste des affectations') }}
            <div class="flex gap-4">
                <a href="{{ route('affectations.chart', $profil) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                    Calendrier
                </a>
                <a href="{{ route('affectations.create', $profil) }}"
                    class="bg-green-500 hover:bg-green-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                    Créer
                </a>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold mb-2">Filtres</h2>
                    <form method="GET" action="{{ route('affectations.index', $profil) }}">
                        <div class="flex gap-4 mb-4">
                            <div>
                                <label for="date_debut">Date de début :</label>
                                <input class="rounded px-3 py-2" type="date" name="date_debut" id="date_debut"
                                    value="{{ request('date_debut') }}">
                            </div>
                            <div>
                                <label for="date_fin">Date de fin :</label>
                                <input class="rounded px-3 py-2" type="date" name="date_fin" id="date_fin"
                                    value="{{ request('date_fin') }}">
                            </div>
                            <div>
                                <label for="poste_id">Poste :</label>
                                <select name="poste_id" id="poste_id">
                                    <option value="">Tous</option>
                                    @foreach ($postes as $poste)
                                        <option value="{{ $poste->id }}"
                                            {{ request('poste_id') == $poste->id ? 'selected' : '' }}>
                                            {{ $poste->code }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="personnel_id">Personnel :</label>
                                <select name="personnel_id" id="personnel_id">
                                    <option value="">Tous</option>
                                    @foreach ($personnels as $personnel)
                                        <option value="{{ $personnel->id }}"
                                            {{ request('personnel_id') == $personnel->id ? 'selected' : '' }}>
                                            {{ $personnel->nom }} {{ $personnel->prenom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">Filtrer</button>
                        </div>
                    </form>
                    <div class="mb-4">
                        {{ $affectations->links() }}
                    </div>
                    <table class="table w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Poste
                                </th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Personnel
                                </th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Date de
                                    début</th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Date de
                                    fin</th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Chef de
                                    poste</th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($affectations->count() > 0)
                                @foreach ($affectations as $affectation)
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $affectation->poste->code }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $affectation->personnel->email }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $affectation->date_debut }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $affectation->date_fin }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $affectation->chef_de_poste ? 'Oui' : 'Non' }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('affectations.edit', [$profil, $affectation]) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                                                    Modifier
                                                </a>
                                                <form
                                                    action="{{ route('affectations.destroy', [$profil, $affectation]) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette affectation ?')">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="15" class="border text-center py-4">Pas d'affectations enregistrées
                                        pour
                                        l'instant</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
