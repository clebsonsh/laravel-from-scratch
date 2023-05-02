<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {
        request()->user()->posts()->create([
            ...$this->validatePost(),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]);

        return redirect()->route('home')->with('success', 'Post created!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if (request()->file('thumbnail')) {
            if ($post->thumbnail && Storage::exists($post->thumbnail ?? '')) {
                Storage::delete($post->thumbnail);
            }
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return redirect()->route('home')->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        if ($post->thumbnail && Storage::exists($post->thumbnail ?? '')) {
            Storage::delete($post->thumbnail);
        }

        $post->delete();

        return back()->with('success', 'Post deleted!');
    }

    protected function validatePost(?Post $post = null)
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required|min:3|max:255',
            'thumbnail' => $post->exists ? 'image' : 'required|image',
            'slug' => ['required', 'min:3', 'max:255', Rule::unique('posts')->ignore($post)],
            'excerpt' => 'required|min:3',
            'body' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
        ]);
    }
}
