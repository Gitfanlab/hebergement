<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Détails du personnel') }}
            <div class="flex gap-2 items-center">
                <a href="{{ route('personnels.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                    Retour
                </a>
                <a href="{{ route('personnels.edit', $personnel) }}"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                    Modifier
                </a>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <x-input-label for="nom" :value="__('Nom')" />
                            <p>{{ $personnel->nom }}</p>
                        </div>

                        <div>
                            <x-input-label for="prenom" :value="__('Prénom')" />
                            <p>{{ $personnel->prenom }}</p>
                        </div>

                        <div>
                            <x-input-label for="sexe" :value="__('Sexe')" />
                            <p>{{ $personnel->sexe }}</p>
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <p>{{ $personnel->email }}</p>
                        </div>

                        <div>
                            <x-input-label for="groupement" :value="__('Groupement')" />
                            <p>{{ $personnel->groupement }}</p>
                        </div>

                        <div>
                            <x-input-label for="service" :value="__('Service')" />
                            <p>{{ $personnel->service }}</p>
                        </div>

                        <div>
                            <x-input-label for="statut" :value="__('Statut')" />
                            <p>{{ $personnel->statut }}</p>
                        </div>

                        <div>
                            <x-input-label for="grade_id" :value="__('Grade')" />
                            <p>{{ $personnel->grade->nom }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
