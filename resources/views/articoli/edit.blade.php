<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifica Articolo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @php
            $buttons = [
            ['type' => 'dettagli', 'label' => 'Salva', 'confirm' => 'Sei sicuro di voler eliminare questo articolo?', 'buttonType' => 'submit'],
            ['type' => 'elimina', 'label' => 'Annulla', 'href' => route('articoli.index')],
            ];
            @endphp

            <form action="{{ route('articoli.update', $articolo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-card-articolo :buttons="$buttons">

                    <div class="mb-6">
                        <label class="text-lg font-bold text-gray-900 mb-3">Titolo</label>
                        <x-slot name="titolo">
                            <input type="text" name="titolo" value="{{ $articolo->titolo }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                            @error('titolo')
                            <x-alert type="error">
                                <ul>
                                    <li> {{ $message }}</li>
                                </ul>
                            </x-alert>
                            @enderror
                        </x-slot>
                    </div>
                    <div class="mb-6">
                        <label class="text-lg font-bold text-gray-900 mb-3">Contenuto</label>
                        <textarea name="contenuto"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            rows="8">{{ $articolo->contenuto }}</textarea>
                        @error('contenuto')
                        <x-alert type="error">
                            <ul>
                                <li> {{ $message }}</li>
                            </ul>
                        </x-alert>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <x-slot name="categoria">
                            <label class="text-lg font-bold text-gray-900 mb-3">Categoria</label>
                            <select name="categoria_id"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                                <option value=""> Seleziona una categoria </option>
                                @foreach($categorie as $categoria)
                                <option value="{{ $categoria->id }}" @if($articolo->categoria_id == $categoria->id) selected @endif>
                                    {{ $categoria->nome }}
                                </option>
                                @endforeach
                            </select>
                            @error('categoria_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </x-slot>
                    </div>
                    <div class="mb-6">
                        <label class="text-lg font-bold text-gray-900 mb-3">Immagine </label>
                        @if($articolo->immagine)
                        <x-slot name="immagine">
                            <div class="w-full h-48 overflow-hidden bg-gray-200">
                                <img src="{{ asset('storage/' . $articolo->immagine) }}" alt="{{ $articolo->titolo }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                        </x-slot>
                        @endif
                        <input type="file" name="immagine" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <p class="text-gray-500 text-sm mt-1">Lascia vuoto per mantenere l'immagine attuale.</p>
                    </div>
                </x-card-articolo>
            </form>
        </div>
    </div>
</x-app-layout>