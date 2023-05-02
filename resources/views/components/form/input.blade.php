@props(['name'])

<x-form :name="$name">
    <input {{ $attributes(['value' => old($name), 'class' => 'border border-gray-200 p-2 w-full rounded']) }}
        name="{{ $name }}" id="{{ $name }}" />
</x-form>
