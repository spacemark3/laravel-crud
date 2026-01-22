<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifica Articolo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-8">
                <form action="{{ route('articoli.update', $articolo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-6">
                        <label class="text-lg font-bold text-gray-900 mb-3">Titolo</label>
                        <input type="text" name="titoli" value="{{ $articolo->titoli }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                               required>
                        @error('titoli') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-6">
                        <label class="text-lg font-bold text-gray-900 mb-3">Contenuto</label>
                        <textarea name="contenuto" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                  rows="8" required>{{ $articolo->contenuto }}</textarea>
                        @error('contenuto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="text-lg font-bold text-gray-900 mb-3">Categoria</label>
                        <select name="categoria_id" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                            <option value="">-- Seleziona una categoria --</option>
                            @foreach($categorie as $categoria)
                                <option value="{{ $categoria->id }}" @if($articolo->categoria_id == $categoria->id) selected @endif>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="text-lg font-bold text-gray-900 mb-3">Immagine (Wallpaper)</label>
                        @if($articolo->immagine)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $articolo->immagine) }}" alt="{{ $articolo->titoli }}" class="h-32 w-auto rounded-lg">
                                <p class="text-gray-600 text-sm mt-2">Immagine attuale</p>
                            </div>
                        @endif
                        <input type="file" name="immagine" accept="image/*"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <p class="text-gray-500 text-sm mt-1">Formati supportati: JPEG, PNG, JPG, GIF (Max 2MB). Lascia vuoto per mantenere l'immagine attuale.</p>
                        @error('immagine') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded">
                            Salva
                        </button>
                        <a href="{{ route('articoli.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded">
                            Annulla
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>