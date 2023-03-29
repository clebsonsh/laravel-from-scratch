@props(['active' => false])

@php
    $class = 'block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300';
    
    if ($active) {
        $class .= ' bg-gray-300';
    }
    
@endphp

<a {{ $attributes(['class' => $class]) }} class="">
    {{ $slot }}
</a>
