<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Fiction']);
        Category::create(['name' => 'Non-Fiction']);
        Category::create(['name' => 'Science']);
        Category::create(['name' => 'Biography']);
    }
}
