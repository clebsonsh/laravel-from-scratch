<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log in!</h1>
                <form action="/login" method="POST" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" requierd />

                    <x-form.input name="password" type="password" autocomplete="current-password" requierd />

                    <div class="flex justify-end">
                        <x-form.button>Log in</x-form.button>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
