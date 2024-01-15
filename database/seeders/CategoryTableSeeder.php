<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        Schema::disableForeignKeyConstraints();

        
        Category::truncate();

        
        Schema::enableForeignKeyConstraints();

        
        Category::create([
            'category_id' => 'Satu',
            'image'       => 'file/category/default.jpg',
        ]);

        Category::create([
            'category_id' => 'Dua',
            'image'       => 'file/category/default.jpg',
        ]);

        Category::create([
            'category_id' => 'Tiga',
            'image'       => 'file/category/default.jpg',
        ]);
    }
}
