<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Schema::disableForeignKeyConstraints();

        
        Post::truncate();

        
        Schema::enableForeignKeyConstraints();

        
        Post::insert([
            'title' => 'Post 1',
            'slug' => 'post-1',
            'banner' => 'file/post/default.png',
            'categories_id' => 1,
            'is_headline' => 0,
            'status' => Post::STATUS_PUBLISHED, 
            'content' => 'Isi dari post 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Post::insert([
            'title' => 'Post 2',
            'slug' => 'post-2',
            'banner' => 'file/post/default.png',
            'categories_id' => 1,
            'is_headline' => 0,
            'status' => Post::STATUS_PUBLISHED, 
            'content' => 'Isi dari post 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
    }
}
