<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form action="/register" method="POST" class="mt-10">
                @csrf

                <x-form.input name="name" />

                <x-form.input name="username" />

                <x-form.input name="email" type="email" autocomplete="username" />

                <x-form.input name="password" type="password" autocomplete="new-password" />

                <div class="flex justify-end">
                    <x-form.button>Log in</x-form.button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
