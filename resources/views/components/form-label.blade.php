<label {{ $attributes->merge(['class' => 'static mb-2 uppercase font-bold text-xs text-gray-700']) }} 
        for="{{ $for }}">{{ $slot }}</label>