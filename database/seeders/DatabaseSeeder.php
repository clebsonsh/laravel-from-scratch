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
        $user = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'john-doe'
        ]);

        $categories = Category::factory(5)->create();

        foreach ($categories as $category) {
            Post::factory(4)->create([
                'user_id' => $user->id,
                'category_id' => $category->id,
            ]);
        }
    }
}
