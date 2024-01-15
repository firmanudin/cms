<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mainmenu;

class MainmenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Mainmenu:: truncate();

        
        Mainmenu::create([
            'title'    => 'Beranda',
            'status'   => '1',
            'content'  => 'Content for menu 1',
            'parent'   => '0',
            'category' => 'link',
            'file'     => null,
            'url'      => '/',
            'order'    => '1',
        ]);

        Mainmenu::create([
            'title'    => 'News',
            'status'   => '1',
            'content'  => 'Content for menu 2',
            'parent'   => '0',
            'category' => 'link',
            'file'     => null,
            'url'      => '/news',
            'order'    => '1',
        ]);

        Mainmenu::create([
            'title'    => 'Login',
            'status'   => '1',
            'content'  => 'Content for menu 3',
            'parent'   => '0',
            'category' => 'link',
            'file'     => null,
            'url'      => '/login',
            'order'    => '1',
        ]);
    }
}
