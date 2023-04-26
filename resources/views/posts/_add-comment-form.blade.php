@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center mb-4">
                <img class="rounded-full" src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="Profile" height="40"
                    width="40">
                <h2 class="ml-4">What to participate? </h2>
            </header>

            <x-form.textarea name="body" label="false" />

            <div class="flex justify-end mt-4 border-t border-gray-200 pt-4">
                <x-form.button>
                    Post
                </x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold text-center">
        <a class="hover:underline" href="/register">Register </a> or
        <a class="hover:underline" href="/login">log in</a> to leave a comment!
    </p>
@endauth
