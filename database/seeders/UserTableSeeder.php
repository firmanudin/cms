<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User:: truncate();

        
        User::create([
            'name'     => 'User 1',
            'email'    => 'user1@example.com',
            'password' => Hash::make('11111'),
            'role'     => 'Admin',
            'image'    => 'file/admin/default.jpg',
            'content'  => 'Content for user 1',
            'desc'     => 'Description for user 1',
        ]);

        User::create([
            'name'     => 'User 2',
            'email'    => 'user2@example.com',
            'password' => Hash::make('11111'),
            'role'     => 'Author',
            'image'    => 'file/admin/default.jpg',
            'content'  => 'Content for user 2',
            'desc'     => 'Description for user 2',
        ]);

        
    }
}
