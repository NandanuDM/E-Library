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
        $publishers = [
            ['name' => 'Gramedia Pustaka Utama'],
            ['name' => 'Penguin Random House'],
            ['name' => 'HarperCollins'],
            ['name' => 'Simon & Schuster'],
            ['name' => 'Hachette Book Group'],
            ['name' => 'Macmillan Publishers'],
            ['name' => 'Pearson'],
            ['name' => 'Scholastic'],
            ['name' => 'McGraw-Hill Education'],
            ['name' => 'Houghton Mifflin Harcourt'],
            ['name' => 'Wiley'],
            ['name' => 'Bentang Pustaka'],
            ['name' => 'Republika Penerbit'],
            ['name' => 'Mizan'],
            ['name' => 'GagasMedia']
        ];

        foreach ($publishers as $publisher) {
            Publisher::create($publisher);
        }
    }
}
