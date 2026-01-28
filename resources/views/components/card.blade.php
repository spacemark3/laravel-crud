<div class="card">
    <div class="immagine">
        {{ $immagine }}
    </div>

    <div class="titolo">
        {{ $slot }}
    </div>

    <div class="card-footer">
        {{ $descrizione ?? '' }}
    </div>

    <x-button type="dettagli">Dettagli</x-button>
    <x-button type="modifica">Modifica</x-button>
    <x-button type="elimina">Elimina</x-button>
</div>
