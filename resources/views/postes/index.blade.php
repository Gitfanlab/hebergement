<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Liste des postes') }}
            <a href="{{ route('postes.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                Créer
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        {{ $postes->links() }}
                    </div>
                    <table class="table w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Code</th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Nombre de
                                    lits</th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Téléphone
                                </th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Sexe</th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Grade
                                </th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($postes->count() > 0)
                                @foreach ($postes as $poste)
                                    <tr>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $poste->code }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $poste->nb_lits }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $poste->tel }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $poste->sexe }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $poste->grade->nom }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2 items-center justify-center">
                                                <a href="{{ route('postes.show', $poste) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                                                    Voir plus
                                                </a>
                                                <a href="{{ route('postes.edit', $poste) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                                                    Modifier
                                                </a>
                                                <form action="{{ route('postes.destroy', $poste) }}" method="POST"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce poste ?')">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="15" class="border text-center py-4">Pas de postes enregistrés pour
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
