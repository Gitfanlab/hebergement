<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Liste des profils') }}
            <a href="{{ route('profils.create') }}"
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
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">ID</th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Nom</th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">
                                    Description</th>
                                <th class="border border-gray-300 text-sm font-medium text-gray-700 px-4 py-2">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($profils->count() > 0)
                                @foreach ($profils as $profil)
                                    <tr class="border-b border-gray-300">
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $profil->id }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $profil->nom }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $profil->description }}</td>
                                        <td
                                            class="border border-gray-300 px-4 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2 items-center justify-center">
                                                <a href="{{ route('affectations.index', $profil) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                                                    Sélectionner
                                                </a>
                                                <a href="{{ route('profils.edit', $profil) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                                                    Modifier
                                                </a>
                                                <form action="{{ route('profils.destroy', $profil) }}" method="POST"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce profil ?')">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="border text-center py-4">Pas de profils enregistrés pour
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
