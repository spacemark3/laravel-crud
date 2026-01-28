<button
    {{ $attributes->merge([
        'class' => match($type) {
            'dettagli' => 'bg-blue-600 text-white rounded',
            'modifica' => 'bg-green-600 text-white',
            'elimina' => 'bg-red-600 text-white',
            default =>'bg-blue-600 text-white',
        } . ' px-4 py-2 rounded hover:opacity-90 transition'
    ]) }} 
>
    {{ $slot }}
</button>