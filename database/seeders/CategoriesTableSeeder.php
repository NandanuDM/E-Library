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
        Category::create(['name' => 'Fiksi']);
        Category::create(['name' => 'Non-Fiksi']);
        Category::create(['name' => 'Sains']);
        Category::create(['name' => 'Biografi']);
        Category::create(['name' => 'Teknologi']);
        Category::create(['name' => 'Sosial']);
        Category::create(['name' => 'Sejarah']);
    }
}
