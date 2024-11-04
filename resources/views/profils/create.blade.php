<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Créer un nouveau profil') }}
            <a href="{{ route('profils.index') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                Retour
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('profils.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="nom" :value="__('Nom du profil')" />
                            <x-text-input id="nom" class="block mt-1 w-full mb-4" type="text" name="nom"
                                :value="old('nom')" required autofocus />
                            @error('nom')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                            @error('description')
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
