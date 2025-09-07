<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(9)->create();

        $posts = Post::factory(130)
            ->has(Comment::factory(23)->recycle($users))
            ->recycle($users)
            ->create();

        $admin = User::factory()
            ->has(Post::factory(3))
            ->has(Comment::factory(20)->recycle($posts))
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
    }
}
