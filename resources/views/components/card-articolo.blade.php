@props([
'buttons' => [],
])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col">
    <div class="w-full h-48 overflow-hidden bg-gray-200">
        {{ $immagine }}
    </div>

    <div class="p-6 flex flex-col flex-1">
        <h3 class="text-lg font-bold text-gray-900 mb-2">
            {{ $titolo }}
        </h3>

        @if($categoria)
        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded mb-2">
            {{ $categoria }}
        </span>
        @endif

        <div class="text-gray-600 text-sm mb-4 flex-1">
            {{ $slot }}
        </div>

        @if(count($buttons))
        <div class="flex flex-wrap gap-3 mt-auto">
            @foreach($buttons as $button)
            <x-button
                :type="$button['type']"
                :href="$button['href'] ?? null"
                :action="$button['action'] ?? null"
                :confirm="$button['confirm'] ?? null"
                :buttonType="$button['buttonType'] ?? null"
                class="flex-1">

                {{ $button['label'] }}
                
            </x-button>
            @endforeach
        </div>
        @endif
    </div>
</div>