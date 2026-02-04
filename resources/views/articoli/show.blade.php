<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{'Dettagli Articolo'}}
            </h2>
            <a href="{{ route('articoli.index') }}" class="text-gray-600 hover:text-gray-900 font-semibold">
                <- Torna alla lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                @if($articolo->immagine)
                    <div class="w-full h-96 overflow-hidden bg-gray-200">
                        <img src="{{ asset('storage/' . $articolo->immagine) }}" alt="{{ $articolo->titolo }}" 
                             class="w-full h-full object-cover">
                    </div>
                @endif
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-6">
                    <h1 class="text-3xl font-bold text-white">{{ $articolo->titolo }}</h1>
                </div>
                <div class="p-8">
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Descrizione</h3>
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $articolo->contenuto }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <p class="text-sm text-gray-600 font-semibold mb-1">Data Creazione</p>
                            <p class="text-gray-900 font-medium">{{ $articolo->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 font-semibold mb-1">Ultimo Aggiornamento</p>
                            <p class="text-gray-900 font-medium">{{ $articolo->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('articoli.edit', $articolo->id) }}" 
                           class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-4 rounded-lg text-center transition-colors duration-200">
                            Modifica
                        </a>
                        
                        <form action="{{ route('articoli.destroy', $articolo->id) }}" 
                              method="POST" 
                              style="display:contents;" 
                              onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-4 rounded-lg text-center transition-colors duration-200">
                                Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


