<x-app-layout>
    <x-slot name="header">
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
                    <input type="text" name="search" value="{{ $search ?? '' }}"
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
                @foreach($articoli as $articolo)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    @if($articolo->immagine)
                    <div class="w-full h-48 overflow-hidden bg-gray-200">
                        <img src="{{ asset('storage/' . $articolo->immagine) }}" alt="{{ $articolo->titoli }}"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    @else
                    <div class="w-full h-48 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                        <span class="text-gray-600 font-semibold">No Image</span>
                    </div>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-lg font-bold text-gray-900">{{ $articolo->titoli }}</h3>
                            @if($articolo->categoria)
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">
                                {{ $articolo->categoria->nome }}
                            </span>
                            @else
                            <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2 py-1 rounded">
                                Nessuna categoria
                            </span>
                            @endif
                        </div>
                        <p class="text-gray-600 text-sm mb-6 line-clamp-3">{{ $articolo->contenuto }}</p>

                        <div class="flex gap-3">
                            <a href="{{ route('articoli.show', $articolo->id) }}"
                                class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded text-center text-sm transition-colors duration-200">
                                Dettagli
                            </a>
                            <a href="{{ route('articoli.edit', $articolo->id) }}"
                                class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-3 rounded text-center text-sm transition-colors duration-200">
                                Modifica
                            </a>

                            <form action="{{ route('articoli.destroy', $articolo->id) }}"
                                method="POST"
                                style="display:contents;"
                                onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-3 rounded text-center text-sm transition-colors duration-200">
                                    Elimina
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $articoli->links() }}
            @else
            <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                <p class="text-gray-500 text-lg mb-6">Nessun articolo trovato</p>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>