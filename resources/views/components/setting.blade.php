@props(['heading'])

<section class="max-w-4xl mx-auto py-8">
    <h1 class="font-bold text-xl mb-6 pb-6 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/admin/dashboard" @class(['text-blue-500' => request()->is('admin/dashboard')])>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/admin/posts/create" @class(['text-blue-500' => request()->is('admin/posts/create')])>
                        New Post
                    </a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
