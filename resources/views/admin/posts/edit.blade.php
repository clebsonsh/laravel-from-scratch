<x-layout>
    <x-setting :heading="'Edit Post, ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf

            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" required />

            <x-form.input name="slug" :value="old('slug', $post->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" />
                </div>

                <img src="{{ $post->thumbnail ? asset('/storage/' . $post->thumbnail) : '/images/illustration-' . rand(1, 4) . '.png' }}"
                    alt="Post thumbnail" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.textarea name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>

            <x-form.textarea name="body" required>{{ old('body', $post->body) }}</x-form.textarea>

            <div class="mb-6">
                <x-form.label name="category" />
                <select name="category_id" id="category" class="border border-gray-200 p-2 w-full rounded" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected($category->id == old('category_id', $post->category_id))>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
                <x-form.error name="category_id" />
            </div>

            <div class="flex justify-end">
                <x-form.button>Update</x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>
