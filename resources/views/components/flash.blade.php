@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
        class="fixed bottom-2 right-2 bg-blue-500 text-sm text-white py-2 px-4 rounded">
        <p>{{ session('success') }}</p>
    </div>
@endif
