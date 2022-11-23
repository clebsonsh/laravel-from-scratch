<x-layout>
    <article>
        <h2>{{ $post->title }}</h2>

        <div>
            <p>
                {!! $post->body !!}
            </p>
        </div>
    </article>

    <a href="/">Go Back</a>
</x-layout>
