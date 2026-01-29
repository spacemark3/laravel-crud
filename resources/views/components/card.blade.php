@props([
'buttons' => [],
'abra',
])
<div>
    <div>
        {{ $immagine }}
    </div>

    <div>
        <div>
            {{ $titolo }}
        </div>
        <div>
            {{ $categoria }}
        </div>
        {{ $slot }}
        @foreach ($buttons as $button)
        <x-button :type="$button['type']">
            {{ $button['label'] }}
        </x-button>
        @endforeach

        <x-alert type="success" class="mb-4">
            Operazione completata con successo!
        </x-alert>

        <x-alert type="error" id="alert1">
            Il titolo è obbligatorio
        </x-alert>

        <x-alert type="warning" class="mb-4">
            Campi non validi
        </x-alert>

        <x-alert class="mb-4">
            Messaggio informativo generico
        </x-alert>

    </div>
</div>