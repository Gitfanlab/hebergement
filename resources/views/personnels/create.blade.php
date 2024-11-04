<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Créer un nouveau personnel') }}
            <a href="{{ route('personnels.index') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                Retour
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('personnels.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="nom" :value="__('Nom')" />
                            <x-text-input id="nom" class="block mt-1 w-full mb-4" type="text" name="nom"
                                :value="old('nom')" required autofocus />
                            @error('nom')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="prenom" :value="__('Prénom')" />
                            <x-text-input id="prenom" class="block mt-1 w-full mb-4" type="text" name="prenom"
                                :value="old('prenom')" required />
                            @error('prenom')
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
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full mb-4" type="email" name="email"
                                :value="old('email')" required />
                            @error('email')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="groupement" :value="__('Groupement')" />
                            <x-text-input id="groupement" class="block mt-1 w-full mb-4" type="text"
                                name="groupement" :value="old('groupement')" />
                            @error('groupement')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="service" :value="__('Service')" />
                            <x-text-input id="service" class="block mt-1 w-full mb-4" type="text" name="service"
                                :value="old('service')" />
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
