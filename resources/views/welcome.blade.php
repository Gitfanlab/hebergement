<x-guest-layout>
    <div class="flex flex-col gap-4 items-center justify-center text-center">
        <h1 class="text-2xl font-semibold">Bienvenue sur Hébergement</h1>
        <p>Hébergement est une application destinée au Charles de Gaulle afin de gérer l'affectations des marins à des
            postes et visualiser les tables de couchages</p>
        <div class="flex flex-col gap-4 items-center">
            <a href="{{ route('login') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                Connexion
            </a>
        </div>
    </div>
</x-guest-layout>
