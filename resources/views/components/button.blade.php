@props([
'type' => 'default', // styling
'href' => null, // link
'action' => null, // form action
'confirm' => null, // messaggio di conferma
'buttonType' => 'button', 
])

@php
$classes = match($type) {
'dettagli' => 'flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded text-center text-sm transition-colors duration-200',
'modifica' => 'flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-3 rounded text-center text-sm transition-colors duration-200',
'elimina' => 'flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-3 rounded text-center text-sm transition-colors duration-200',
default => 'bg-gray-500 text-white',
};
@endphp

@if($href)
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
@elseif($action)
<form action="{{ $action }}" method="POST" style="display: contents;"
    @if($confirm)
    onsubmit="return confirm('{{ $confirm }}')" @endif>
    @csrf
    @method('DELETE')
    <button type="submit" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
</form>
@else

<button type="{{ $buttonType }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
@endif