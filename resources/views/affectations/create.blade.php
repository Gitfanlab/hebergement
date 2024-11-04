<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Créer une nouvelle affectation') }}
            <a href="{{ route('affectations.index', $profil) }}"
                class="bg-gray-500 hover:bg-gray-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                Retour
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="mb-4">

                            <div class="font-medium text-red-600">
                                Il y a eu des problèmes avec votre saisie.
                            </div>

                            <ul class="list-disc list-inside text-red-500">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('affectations.store', $profil) }}">
                        @csrf

                        <div>
                            <x-input-label for="date_debut" :value="__('Date de début')" />
                            <x-text-input id="date_debut" class="block mt-1 w-full mb-4" type="date"
                                name="date_debut" :value="old('date_debut')" required />
                            @error('date_debut')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="date_fin" :value="__('Date de fin')" />
                            <x-text-input id="date_fin" class="block mt-1 w-full mb-4" type="date" name="date_fin"
                                :value="old('date_fin')" required />
                            @error('date_fin')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="poste_id" :value="__('Poste')" />
                            <select id="poste_id" name="poste_id"
                                class="block mt-1 w-full mb-4 rounded border-gray-300">
                                <option value="">Sélectionnez un poste</option>
                                @foreach ($postes as $poste)
                                    <option value="{{ $poste->id }}"
                                        {{ old('poste_id') == $poste->id ? 'selected' : '' }}>{{ $poste->code }}
                                    </option>
                                @endforeach
                            </select>
                            @error('poste_id')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="personnel_id" :value="__('Personnel')" />
                            <select id="personnel_id" name="personnel_id"
                                class="block mt-1 w-full mb-4 rounded border-gray-300">
                                <option value="">Sélectionnez un personnel</option>
                                @foreach ($personnels as $personnel)
                                    <option value="{{ $personnel->id }}"
                                        {{ old('personnel_id') == $personnel->id ? 'selected' : '' }}>
                                        {{ $personnel->nom }} {{ $personnel->prenom }}</option>
                                @endforeach
                            </select>
                            @error('personnel_id')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="chef_de_poste" :value="__('Chef de poste')" />

                            <div class="flex items-center gap-2">
                                <input type="radio" id="chef_de_poste_oui" name="chef_de_poste" value="1"
                                    {{ old('chef_de_poste') ? 'checked' : '' }}>
                                <label for="chef_de_poste_oui">Oui</label>

                                <input type="radio" id="chef_de_poste_non" name="chef_de_poste" value="0"
                                    {{ !old('chef_de_poste') ? 'checked' : '' }}>
                                <label for="chef_de_poste_non">Non</label>
                            </div>
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
