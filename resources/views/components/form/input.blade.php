@props(['name'])

<x-form :name="$name">
    <input {{ $attributes }} class="border border-gray-200 p-2 w-full rounded" name="{{ $name }}"
        id="{{ $name }}" value="{{ old($name) }}" required />
</x-form>
