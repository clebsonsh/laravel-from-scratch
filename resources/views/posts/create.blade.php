<x-layout>
    <section class="max-w-sm mx-auto py-8">
        <h1 class="font-bold text-xl mb-4">Publish New Post</h1>
        <x-panel>
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" />

                <x-form.input name="slug" />

                <x-form.input name="thumbnail" type="file" />

                <x-form.textarea name="excerpt" />

                <x-form.textarea name="body" />

                <div class="mb-6">
                    <x-form.label name="category" />
                    <select name="category_id" id="category" class="border border-gray-400 p-2 w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($category->id == old('category_id'))>
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="category_id" />
                </div>

                <div class="flex justify-end">
                    <x-form.button>Publish</x-form.button>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>
