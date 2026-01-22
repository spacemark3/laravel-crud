<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $categoria->nome }}
            </h2>
            <a href="{{ route('categorie.index') }}" class="text-gray-600 hover:text-gray-900 font-semibold">
                ← Torna alle categorie
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">
                Articoli ({{ $articoli->total() }}):
            </h3>
            @if($articoli->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($articoli as $articolo)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="p-6">
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
                                <h4 class="text-lg font-bold text-gray-900 mb-3">{{ $articolo->titoli }}</h4>
                                <p class="text-gray-600 text-sm mb-6 line-clamp-3">{{ $articolo->contenuto }}</p>
                                
                                <div class="flex gap-3">
                                    <a href="{{ route('articoli.show', $articolo->id) }}" 
                                       class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded text-center text-sm">
                                        Dettagli
                                    </a>
                                    <a href="{{ route('articoli.edit', $articolo->id) }}" 
                                       class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-3 rounded text-center text-sm">
                                        Modifica
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $articoli->links() }}
                </div>
            @else
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <p class="text-gray-500 text-lg">Nessun articolo in questa categoria</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
