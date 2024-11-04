<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Créer un nouveau poste') }}
            <a href="{{ route('postes.index') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                Retour
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('postes.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="code" :value="__('Code')" />
                            <x-text-input id="code" class="block mt-1 w-full mb-4" type="text" name="code"
                                :value="old('code')" required autofocus />
                            @error('code')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="nb_lits" :value="__('Nombre de lits')" />
                            <x-text-input id="nb_lits" class="block mt-1 w-full mb-4" type="number" name="nb_lits"
                                :value="old('nb_lits')" required />
                            @error('nb_lits')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="tel" :value="__('Téléphone')" />
                            <x-text-input id="tel" class="block mt-1 w-full mb-4" type="text" name="tel"
                                :value="old('tel')" required />
                            @error('tel')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="type_acces" :value="__('Type d\'accès')" />
                            <select id="type_acces" name="type_acces"
                                class="block mt-1 w-full mb-4 rounded border-gray-300">
                                <option value="" class="hidden">Sélectionnez un type d'accès</option>
                                <option value="BADGE">BADGE</option>
                                <option value="CODE">CODE</option>
                            </select>
                            @error('type_acces')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="code_acces" :value="__('Code d\'accès')" />
                            <x-text-input id="code_acces" class="block mt-1 w-full mb-4" type="text"
                                name="code_acces" :value="old('code_acces')" />
                            @error('code_acces')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="sexe" :value="__('Sexe')" />
                            <select id="sexe" name="sexe"
                                class="block mt-1 w-full mb-4 rounded border-gray-300">
                                <option value="" class="hidden">Sélectionnez un sexe</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Féminin">Féminin</option>
                            </select>
                            @error('sexe')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="groupement" :value="__('Groupement')" />
                            <x-text-input id="groupement" class="block mt-1 w-full mb-4" type="text"
                                name="groupement" :value="old('groupement')" required />
                            @error('groupement')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="service" :value="__('Service')" />
                            <x-text-input id="service" class="block mt-1 w-full mb-4" type="text" name="service"
                                :value="old('service')" required />
                            @error('service')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="statut" :value="__('Statut')" />
                            <x-text-input id="statut" class="block mt-1 w-full mb-4" type="text" name="statut"
                                :value="old('statut')" />
                            @error('statut')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="type_renfort" :value="__('Type de renfort')" />
                            <x-text-input id="type_renfort" class="block mt-1 w-full mb-4" type="text"
                                name="type_renfort" :value="old('type_renfort')" />
                            @error('type_renfort')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="observation" :value="__('Observation')" />
                            <textarea id="observation" name="observation"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('observation') }}</textarea>
                            @error('observation')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="modif_annee_pro" :value="__('Modification année prochaine')" />
                            <x-text-input id="modif_annee_pro" class="block mt-1 w-full mb-4" type="text"
                                name="modif_annee_pro" :value="old('modif_annee_pro')" />
                            @error('modif_annee_pro')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="grade_id" :value="__('Grade')" />
                            <select id="grade_id" class="block mt-1 w-full mb-4 rounded border-gray-300"
                                name="grade_id" required>
                                <option value="" class="hidden">Sélectionnez un grade</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}"
                                        {{ old('grade_id') == $grade->id ? 'selected' : '' }}>{{ $grade->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('grade_id')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Créer') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
