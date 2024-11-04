<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Détails du poste') }}
            <div class="flex gap-2 items-center">
                <a href="{{ route('postes.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                    Retour
                </a>
                <a href="{{ route('postes.edit', $poste) }}"
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
                            <x-input-label for="code" :value="__('Code')" />
                            <p>{{ $poste->code }}</p>
                        </div>

                        <div>
                            <x-input-label for="nb_lits" :value="__('Nombre de lits')" />
                            <p>{{ $poste->nb_lits }}</p>
                        </div>

                        <div>
                            <x-input-label for="tel" :value="__('Téléphone')" />
                            <p>{{ $poste->tel }}</p>
                        </div>

                        <div>
                            <x-input-label for="type_acces" :value="__('Type d\'accès')" />
                            <p>{{ $poste->type_acces }}</p>
                        </div>

                        <div>
                            <x-input-label for="code_acces" :value="__('Code d\'accès')" />
                            <p>{{ $poste->code_acces }}</p>
                        </div>

                        <div>
                            <x-input-label for="sexe" :value="__('Sexe')" />
                            <p>{{ $poste->sexe }}</p>
                        </div>

                        <div>
                            <x-input-label for="groupement" :value="__('Groupement')" />
                            <p>{{ $poste->groupement }}</p>
                        </div>

                        <div>
                            <x-input-label for="service" :value="__('Service')" />
                            <p>{{ $poste->service }}</p>
                        </div>

                        <div>
                            <x-input-label for="statut" :value="__('Statut')" />
                            <p>{{ $poste->statut }}</p>
                        </div>

                        <div>
                            <x-input-label for="type_renfort" :value="__('Type de renfort')" />
                            <p>{{ $poste->type_renfort }}</p>
                        </div>

                        <div>
                            <x-input-label for="observation" :value="__('Observation')" />
                            <p>{{ $poste->observation }}</p>
                        </div>

                        <div>
                            <x-input-label for="modif_annee_pro" :value="__('Modification année prochaine')" />
                            <p>{{ $poste->modif_annee_pro }}</p>
                        </div>

                        <div>
                            <x-input-label for="grade_id" :value="__('Grade')" />
                            <p>{{ $poste->grade->nom }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
