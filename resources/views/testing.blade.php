<x-app-layout>
    <x-slot>
        <h1>Pagina di Test</h1>
        @foreach($articles as $article)
            <p>{{ $article }}</p>
        @endforeach
        <hr>
        @foreach($tables as $table)
            <p>{{ $table }}</p>
        @endforeach
    </x-slot>

</x-app-layout>

