<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Example Book 1',
            'author' => 'Author Name 1',
            'published_year' => 2021,
            'category_id' => 1,
            'publisher_id' => 1,
            'cover_image' => 'path/to/cover/image1.jpg',
            'stock' => 10,
            'rental_price' => 5000,
        ]);

        Book::create([
            'title' => 'Example Book 2',
            'author' => 'Author Name 2',
            'published_year' => 2020,
            'category_id' => 2,
            'publisher_id' => 2,
            'cover_image' => 'path/to/cover/image2.jpg',
            'stock' => 15,
            'rental_price' => 6000,
        ]);

        Book::create([
            'title' => 'Example Book 3',
            'author' => 'Author Name 3',
            'published_year' => 2019,
            'category_id' => 3,
            'publisher_id' => 3,
            'cover_image' => 'path/to/cover/image3.jpg',
            'stock' => 5,
            'rental_price' => 7000,
        ]);

        Book::create([
            'title' => 'Example Book 4',
            'author' => 'Author Name 4',
            'published_year' => 2018,
            'category_id' => 1,
            'publisher_id' => 2,
            'cover_image' => 'path/to/cover/image4.jpg',
            'stock' => 8,
            'rental_price' => 4500,
        ]);

        Book::create([
            'title' => 'Example Book 5',
            'author' => 'Author Name 5',
            'published_year' => 2017,
            'category_id' => 2,
            'publisher_id' => 1,
            'cover_image' => 'path/to/cover/image5.jpg',
            'stock' => 20,
            'rental_price' => 5500,
        ]);

        Book::create([
            'title' => 'Example Book 6',
            'author' => 'Author Name 6',
            'published_year' => 2016,
            'category_id' => 3,
            'publisher_id' => 3,
            'cover_image' => 'path/to/cover/image6.jpg',
            'stock' => 12,
            'rental_price' => 6500,
        ]);
    }
}
