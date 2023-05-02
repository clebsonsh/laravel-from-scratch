<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

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
        $attributes = request()->validate([
            'title' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:posts,slug',
            'thumbnail' => 'required|image',
            'excerpt' => 'required|min:3',
            'body' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

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
        $attributes = request()->validate([
            'title' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:posts,slug,' . $post->id,
            'thumbnail' => 'image',
            'excerpt' => 'required|min:3',
            'body' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
        ]);

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
}
