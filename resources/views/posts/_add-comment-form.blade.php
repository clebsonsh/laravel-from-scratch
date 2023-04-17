@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img class="rounded-full" src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="Profile" height="40"
                    width="40">
                <h2 class="ml-4">What to participate? </h2>
            </header>
            <div class="mt-6">
                <textarea class="w-full text-sm focus:outline-none focus:ring p-2" name="body" id="body" rows="5"
                    placeholder="Quick, think of something to say!" required></textarea>
            </div>
            @error('body')
                <p class="text-red-500 text-xs mt-1">
                    {{ $message }}
                </p>
            @enderror
            <div class="flex justify-end mt-4 border-t border-gray-200 pt-4">
                <x-submit-button>
                    Post
                </x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold text-center">
        <a class="hover:underline" href="/register">Register </a> or
        <a class="hover:underline" href="/login">log in</a> to leave a comment!
    </p>
@endauth
