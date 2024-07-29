<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrowing;
use Carbon\Carbon;
use Faker\Factory as Faker;

class BorrowingsTableSeeder extends Seeder
{
    /**
     * Generate a unique borrow data.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $statuses = ['dipinjam', 'dikembalikan'];
        $borrowings = [];

        $limit = rand(500, 1000);

        for ($i = 0; $i < $limit; $i++) {
            $borrowDate = $faker->dateTimeBetween('-1 years', 'now');
            $returnDate = (rand(0, 1) ? $faker->dateTimeBetween($borrowDate, 'now') : null);
            $status = $returnDate ? 'dikembalikan' : 'dipinjam';
            $lateFee = $status === 'dikembalikan' && $faker->boolean(30) ? $faker->numberBetween(1000, 50000) : 0;

            $borrowings[] = [
                'member_id' => $faker->numberBetween(1, 100),
                'book_id' => $faker->numberBetween(1, 50),
                'librarian_id' => $faker->numberBetween(2, 4),
                'borrow_date' => $borrowDate,
                'return_date' => $returnDate,
                'status' => $status,
                'rental_price' => $faker->numberBetween(5000, 20000),
                'late_fee' => $lateFee,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        Borrowing::insert($borrowings);
    }
}
