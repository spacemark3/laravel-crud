<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categorie
            </h2>
            <a href="{{ route('categorie.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Nuova Categoria
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($categorie->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($categorie as $categoria)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $categoria->nome }}</h3>
                                <p class="text-gray-600 text-sm mb-6">{{ $categoria->descrizione ?? 'Nessuna descrizione' }}</p>
                                <div class="flex gap-3">
                                    <a href="{{ route('categorie.show', $categoria->id) }}" 
                                       class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded text-center text-sm">
                                        Articoli
                                    </a>
                                    <a href="{{ route('categorie.edit', $categoria->id) }}" 
                                       class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-3 rounded text-center text-sm">
                                        Modifica
                                    </a>
                                    
                                    <form action="{{ route('categorie.destroy', $categoria->id) }}" 
                                          method="POST" 
                                          style="display:contents;" 
                                          onsubmit="return confirm('Sei sicuro?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-3 rounded text-center text-sm">
                                            Elimina
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <p class="text-gray-500 text-lg mb-6">Nessuna categoria trovata</p>
                    <a href="{{ route('categorie.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded inline-block">
                        Crea categoria
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
