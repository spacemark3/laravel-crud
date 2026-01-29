<x-app-layout>
         @foreach($articoli as $articolo)
            <h2>{{ $articolo-> titolo }}</h2>
            <p> Categoria: {{ $articolo->categoria->nome }}</p>
        @endforeach

    <x-test>
        <strong> Weila! </strong> trying out <br> qweqweqwe
    </x-test>

</x-app-layout>