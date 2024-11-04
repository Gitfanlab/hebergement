<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ $profil->nom }} : {{ __('Liste des affectations') }}
            <a href="{{ route('affectations.create', $profil) }}"
                class="bg-green-500 hover:bg-green-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                Créer
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                                    <td class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('affectations.edit', [$profil, $affectation]) }}"
                                                class="bg-yellow-500 hover:bg-yellow-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                                                Modifier
                                            </a>
                                            <form action="{{ route('affectations.destroy', [$profil, $affectation]) }}"
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
