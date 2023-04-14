<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(50)->create();

        $categories = Category::factory(10)->create();

        $posts = collect([]);
        foreach ($categories as $category) {

            $posts->push(
                ...Post::factory(rand(5, 15))->create([
                    'user_id' => $users->random()->id,
                    'category_id' => $category->id,
                ])
            );
        }

        foreach ($posts as $post) {
            foreach (range(1, rand(2, 15)) as $x) {
                Comment::factory()->create([
                    'post_id' => $post->id,
                    'user_id' => $users->random()->id,
                ]);
            }
        }
    }
}
