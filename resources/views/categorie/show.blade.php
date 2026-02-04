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
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if($articoli->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($articoli as $articolo)
                    @php
                    $buttons = [
                    ['type' => 'dettagli', 'label' => 'Dettagli', 'href' => route('articoli.show', $articolo->id)],
                    ['type' => 'modifica', 'label' => 'Modifica', 'href' => route('articoli.edit', $articolo->id)],
                    ['type' => 'elimina', 'label' => 'Elimina', 'action' => route('articoli.destroy',$articolo->id), 'confirm' => 'Sei sicuro di volere eliminare questo elemento?']
                    ]
                    @endphp
                    <x-card-articolo :buttons="$buttons">
                        <x-slot name="immagine">
                            @if($articolo->immagine)
                            <img src="{{ asset('storage/'. $articolo->immagine) }}" alt="{{ $articolo->titolo }}"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            @else
                            <div class="w-full h-48 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                                <span class="text-gray-600 font-semibold">No Image</span>
                            </div>
                            @endif
                        </x-slot>
                        <x-slot name="titolo">
                            <h3> {{ $articolo->titolo }} </h3>
                        </x-slot>
                        <x-slot name="categoria">
                            <p> {{ $articolo->categoria->nome }}</p>
                        </x-slot>
                        <p> {{ $articolo->contenuto }}</p>
                    </x-card-articolo>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="my-8">
            {{ $articoli->links() }}
        </div>
        <div>
        </div>
</x-app-layout>