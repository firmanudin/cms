<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Message:: truncate();

        
        Message::create([
            'name'    => 'Pengguna 1',
            'email'   => 'user2@example.com',
            'subject' => 'Subjek 1',
            'message' => 'Isi pesan untuk pengguna 1',
        ]);

        Message::create([
            'name'    => 'Pengguna 2',
            'email'   => 'user1@example.com',
            'subject' => 'Subjek 2',
            'message' => 'Isi pesan untuk pengguna 2',
        ]);

        
    }
}
