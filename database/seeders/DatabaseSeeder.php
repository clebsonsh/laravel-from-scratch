<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
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
        $categories = [];

        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $categories[] = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $categories[] = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        $categories[] = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $categories[0]->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid non necessitatibus placeat quasi corrupti velit rem architecto adipisci odio veritatis dolores, perferendis eaque et impedit pariatur quam! Odit quasi dolorem repudiandae rerum eaque. Deserunt nostrum quibusdam voluptatem consequuntur qui repellat.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $categories[1]->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid non necessitatibus placeat quasi corrupti velit rem architecto adipisci odio veritatis dolores, perferendis eaque et impedit pariatur quam! Odit quasi dolorem repudiandae rerum eaque. Deserunt nostrum quibusdam voluptatem consequuntur qui repellat.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $categories[2]->id,
            'title' => 'My Hobbie Post',
            'slug' => 'my-hobbie-post',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid non necessitatibus placeat quasi corrupti velit rem architecto adipisci odio veritatis dolores, perferendis eaque et impedit pariatur quam! Odit quasi dolorem repudiandae rerum eaque. Deserunt nostrum quibusdam voluptatem consequuntur qui repellat.'
        ]);
    }
}
