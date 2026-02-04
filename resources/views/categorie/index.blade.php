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
                    {{ 'Elenco Categorie'}}
                </h2>
            </div>
            <div class="flex items-center mt-4 space-x-4">
                <a href="{{ route('categorie.create') }}" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-2 px-4 rounded">
                    + Categoria
                </a>
                <form action="{{ route('categorie.index')}}">
                    <input type="text" name="search" value="{{$search}}"
                        placeholder="Cerca categorie..."
                        class="w-64 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded">
                        Cerca
                    </button>
                    @if($search)
                    <a href="{{ route('categorie.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded">
                        Cancella
                    </a>
                    @endif
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($categorie->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categorie as $categoria )
                @php
                $buttons = [
                ['type' => 'dettagli', 'label' => 'Dettagli', 'href' => route('categorie.show', $categoria->id)],
                ['type' => 'modifica', 'label' => 'Modifica', 'href' => route('categorie.edit', $categoria->id)],
                ['type' => 'elimina', 'label' => 'Elimina', 'action' => route('categorie.destroy',$categoria->id), 'confirm' => 'Sei sicuro di volere eliminare questo elemento?']
                ]
                @endphp
                <x-card-categoria :buttons="$buttons">
                    <x-slot name="immagine">
                        @if($categoria->immagine)
                        <div class="w-full h-48 overflow-hidden bg-gray-200">
                            <img src="{{ asset('storage/' . $categoria->immagine) }}" alt="{{ $categoria->nome }}"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                        @else
                        <div class="w-full h-48 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                            <span class="text-gray-600 font-semibold">No Image</span>
                        </div>
                        @endif
                    </x-slot>

                    <x-slot name="nome">
                        {{ $categoria->nome  }}
                    </x-slot>
                    <x-slot>
                        <p> {{ $categoria->descrizione }} </p>
                    </x-slot>
                    </x-card-articolo>
                    @endforeach
            </div>
            <div class="my-8">
                {{ $categorie->links() }}
            </div>
            @else
            <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                <p class="text-gray-500 text-lg mb-6">Nessuna categoria trovata</p>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>