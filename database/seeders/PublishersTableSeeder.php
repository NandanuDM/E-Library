<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::create(['name' => 'Publisher One']);
        Publisher::create(['name' => 'Publisher Two']);
        Publisher::create(['name' => 'Publisher Three']);
    }
}
