<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Comment:: truncate();

        
        Comment::create([
            'name'     => 'John Doe',
            'subject'  => 'Subject 1',
            'email'    => 'john@example.com',
            'comment'  => 'This is a comment',
            'posts_id' => '1',
        ]);

        Comment::create([
            'name'     => 'Jane Doe',
            'subject'  => 'Subject 2',
            'email'    => 'jane@example.com',
            'comment'  => 'This is another comment',
            'posts_id' => '2',
        ]);

        Comment::create([
            'name'     => 'Bob Smith',
            'subject'  => 'Subject 3',
            'email'    => 'bob@example.com',
            'comment'  => 'This is yet another comment',
            'posts_id' => '3',
        ]);
    }
}
