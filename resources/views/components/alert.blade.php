@props([
'type' => [],
'variant' => 'primary',
])

@php
$base = 'mt-2.5 mx-auto max-w-2xl rounded p-2.5 border';

$variants = [
'primary' => match ($type) {
'error' => 'bg-red-500 text-red-100 border-red-600',
'success' => 'bg-green-500 text-green-100 border-green-600',
'warning' => 'bg-yellow-500 text-yellow-900 border-yellow-600',
default => 'bg-blue-500 text-blue-100 border-blue-600',
},

'soft' => match ($type) {
'error' => 'bg-red-100 text-red-800 border-red-300',
'success' => 'bg-green-100 text-green-800 border-green-300',
'warning' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
default => 'bg-blue-100 text-blue-800 border-blue-300',
},

'outline' => match ($type) {
'error' => 'text-red-600 border-red-600',
'success' => 'text-green-600 border-green-600',
'warning' => 'text-yellow-700 border-yellow-600',
default => 'text-blue-600 border-blue-600',
},
];
@endphp

<div {{ $attributes->merge([
'class' => "$base " . ($variants[$variant] ?? $variants['primary'])
]) }}>
    {{ $slot }}
</div>