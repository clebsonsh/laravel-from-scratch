@props(['name', 'label' => 'true'])

<div class="mb-6">
    @if ($label == 'true')
        <x-form.label :name="$name" />
    @endif
    {{ $slot }}
    <x-form.error :name="$name" />
</div>
