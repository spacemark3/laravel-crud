<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $header ?? ''}}
        </h2>
    </x-slot>
    <x-slot>

        <x-primary-button class="mb-4" action="/test3">
            Primary Button
        </x-primary-button>

        <a href="{{ route('test3') }}">
        <x-secondary-button class="mb-4">
            Secondary Button
        </x-secondary-button>
        </a>

        <x-button type="kayoken">
            kayoken button
        </x-button>

        <x-button type="primary" class="mt-4">
            Primary button with custom class
        </x-button>

        <x-button type="secondary" class="mt-4">
            Secondary button with custom class
        </x-button>

        <h1> -> With </h1>
        @foreach($tavole as $tavolo)
        <p> {{ $tavolo }}</p>
        @endforeach
        <hr>

        {{--  <h1> -> Composer </h1>
        @foreach($articoli as $articolo)
        <p> {{ $articolo->titolo }}</p>
        @endforeach--}}
        {{-- -----------test include ----------------- --}}
        <hr>
    </x-slot>

</x-app-layout>