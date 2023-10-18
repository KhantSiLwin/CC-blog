<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       Blog::factory(100)
                ->has(Comment::factory()->count(5))
                ->create();


        User::factory([
            'name' =>'noel',
            'username'=>'Noel',
            'is_admin'=>'1',
            'profile_url' => fake()->imageUrl(),
            'email' =>'noel@gmail.com',
            'password'=>'111111'
        ])->has( Blog::factory(3))
        ->create();
    }
}
