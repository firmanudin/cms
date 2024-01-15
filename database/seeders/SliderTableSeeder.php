<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Slider:: truncate();

        
        Slider::create([
            'title'         => 'Slider 1',
            'image'         => 'file/slider/default1.jpg',
            'categories_id' => 1,
            'order'         => 1,
            'status'        => '1',
            'url'           => 'www.example.com/slider1',
        ]);

        Slider::create([
            'title'         => 'Slider 2',
            'image'         => 'file/slider/default2.svg',
            'categories_id' => 2,
            'order'         => 2,
            'status'        => '1',
            'url'           => 'www.example.com/slider2',
        ]);

        
    }
}
