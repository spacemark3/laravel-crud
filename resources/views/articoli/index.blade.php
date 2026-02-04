<x-app-layout>
    <x-slot name="header">

        @if (session('success'))
        <x-alert type="success" class="mb-8">
            {{ session('success') }}
        </x-alert>
        @endif

        <div class="flex justify-between items-center">
            <div class="flex justify-start">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ 'Elenco Articoli'}}
                </h2>
            </div>
            <div class="flex items-center mt-4 space-x-4">
                <a href="{{ route('articoli.create') }}" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-2 px-4 rounded">
                    + Articolo
                </a>
                <form action="{{ route('articoli.index') }}" method="GET" class="flex gap-3">
                    <input type="text" name="search" value="{{ $search }}"
                        placeholder="Cerca articoli..."
                        class="w-64 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded">
                        Cerca
                    </button>
                    @if($search)
                    <a href="{{ route('articoli.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded">
                        Cancella
                    </a>
                    @endif
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($articoli->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($articoli as $articolo)
                @php
                $buttons = [
                ['type' => 'dettagli', 'label' => 'Dettagli', 'href' => route('articoli.show', $articolo->id)],
                ['type' => 'modifica', 'label' => 'Modifica', 'href' => route('articoli.edit', $articolo->id)],
                ['type' => 'elimina', 'label' => 'Elimina', 'action' => route('articoli.destroy', $articolo->id), 'confirm' => 'Sei sicuro di voler eliminare questo articolo?'],
                ];
                @endphp

                <x-card-articolo :buttons="$buttons">
                    <x-slot name="immagine">
                        <div class="w-full h-48 overflow-hidden bg-gray-200">
                            <img src="{{ asset('storage/' . $articolo->immagine) }}" alt="{{ $articolo->titolo }}"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    </x-slot>

                    <x-slot name="titolo">
                        {{ $articolo->titolo }}
                    </x-slot>

                    <x-slot name="categoria">
                        <strong>{{ $articolo->categoria->nome ?? 'Nessuna categoria' }}</strong>
                    </x-slot>

                    <p>{{ $articolo->contenuto }}</p>
                </x-card-articolo>
                @endforeach
            </div>
            <div class="my-8">
                {{ $articoli->links() }}
            </div>
            @else
            <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                <p class="text-gray-500 text-lg mb-6">Nessuna articolo trovato</p>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>