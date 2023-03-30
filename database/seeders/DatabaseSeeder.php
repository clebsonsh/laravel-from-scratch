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
        $users = User::factory(5)->create();

        $categories = Category::factory(20)->create();

        foreach ($categories as $category) {
            Post::factory(collect([1, 2, 3, 4])->random())->create([
                'user_id' => $users->random()->id,
                'category_id' => $category->id,
            ]);
        }
    }
}
