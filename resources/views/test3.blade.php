<x-app-layout>
    <x-slot> 
         @foreach($articoli as $articolo)
            <h2>{{ $articolo-> titolo }}</h2>
            <p> Categoria: {{ $articolo->categoria->nome }}</p>
        @endforeach
    </x-slot>
</x-app-layout>