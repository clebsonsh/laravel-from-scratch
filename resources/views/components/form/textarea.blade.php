@props(['name', 'label' => 'true'])

<x-form :name="$name" :label="$label">
    <textarea {{ $attributes }} class="border border-gray-200 p-2 w-full rounded" name="{{ $name }}"
        id="{{ $name }}">{{ $slot ?? old($name) }}</textarea>
</x-form>
