<div x-data="{ show: false }" @click.away="show = false" class="w-32">
    <button @click="show = !show" class="py-2 pl-3 pr-9 font-semibold text-sm inline-flex w-full">
        {{ $trigger }}
    </button>

    <div x-show="show" class="py-2 mt-2 absolute bg-gray-100 w-full rounded-xl z-10 shadow" style="display: none;">
        {{ $slot }}
    </div>
</div>
