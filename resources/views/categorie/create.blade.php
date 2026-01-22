<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crea Nuova Categoria
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-8">
                <form action="{{ route('categorie.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Nome</label>
                        <input type="text" name="nome" value="{{ old('nome') }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        @error('nome') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Descrizione</label>
                        <textarea name="descrizione" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                  rows="5">{{ old('descrizione') }}</textarea>
                        @error('descrizione') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded">
                            Salva
                        </button>
                        <a href="{{ route('categorie.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded">
                            Annulla
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
