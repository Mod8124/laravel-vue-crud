<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(4)->create();
        \App\Models\Tag::factory(8)->create();
        \App\Models\Post::factory(100)->create();
        $this->call(PostSeeder::class);
   
    }
}
