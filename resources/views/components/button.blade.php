<button
    {{ $attributes->merge([
        'class' => match($type) {
            'dettagli' => 'flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded text-center text-sm transition-colors duration-200',
            'modifica' => 'flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-3 rounded text-center text-sm transition-colors duration-200',
            'elimina' => 'flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-3 rounded text-center text-sm transition-colors duration-200',
            default =>'bg-blue-600 text-white',
        } . ' px-4 py-2 rounded hover:opacity-90 transition'
    ]) }} 
>
    {{ $slot }}
</button>