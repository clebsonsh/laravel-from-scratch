<div x-data="{ show: false }" @click.away="show = false" class="relative">
    <button @click="show = !show" class="pl-6 py-2.5 pr-10 font-semibold text-sm inline-flex w-full">
        {{ $trigger }}
    </button>

    <div x-show="show" class="py-3 mt-2 absolute bg-gray-100 w-full rounded-xl z-10 shadow overflow-auto max-h-52"
        style="display: none;">
        {{ $slot }}
    </div>
</div>
