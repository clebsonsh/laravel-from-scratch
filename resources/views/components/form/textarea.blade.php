@props(['name', 'label' => 'true'])

<x-form :name="$name" :label="$label">
    <textarea class="border border-gray-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}" required>{{ old($name) }}</textarea>
</x-form>
