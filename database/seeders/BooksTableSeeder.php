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
        $books = [
            // Buku Bahasa Indonesia (30)
            ['title' => 'Laskar Pelangi', 'isbn' => '978-979-1227-19-7', 'author' => 'Andrea Hirata', 'published_year' => 2005, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image1.jpg', 'stock' => 10, 'rental_price' => 5000, 'language' => 'indonesia'],
            ['title' => 'Ayat-Ayat Cinta', 'isbn' => '978-979-3062-79-6', 'author' => 'Habiburrahman El Shirazy', 'published_year' => 2004, 'category_id' => 1, 'publisher_id' => 12, 'cover_image' => 'path/to/cover/image2.jpg', 'stock' => 15, 'rental_price' => 6000, 'language' => 'indonesia'],
            ['title' => 'Bumi Manusia', 'isbn' => '978-979-97312-3-9', 'author' => 'Pramoedya Ananta Toer', 'published_year' => 1980, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image3.jpg', 'stock' => 8, 'rental_price' => 4500, 'language' => 'indonesia'],
            ['title' => 'Negeri 5 Menara', 'isbn' => '978-979-22-3761-1', 'author' => 'Ahmad Fuadi', 'published_year' => 2009, 'category_id' => 1, 'publisher_id' => 13, 'cover_image' => 'path/to/cover/image4.jpg', 'stock' => 10, 'rental_price' => 5000, 'language' => 'indonesia'],
            ['title' => 'Perahu Kertas', 'isbn' => '978-979-1227-41-8', 'author' => 'Dee Lestari', 'published_year' => 2009, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image5.jpg', 'stock' => 7, 'rental_price' => 5500, 'language' => 'indonesia'],
            ['title' => 'Dilan: Dia adalah Dilanku Tahun 1990', 'isbn' => '978-602-8811-47-7', 'author' => 'Pidi Baiq', 'published_year' => 2014, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image6.jpg', 'stock' => 12, 'rental_price' => 6500, 'language' => 'indonesia'],
            ['title' => 'Rindu', 'isbn' => '978-979-780-831-2', 'author' => 'Tere Liye', 'published_year' => 2014, 'category_id' => 1, 'publisher_id' => 12, 'cover_image' => 'path/to/cover/image7.jpg', 'stock' => 18, 'rental_price' => 7500, 'language' => 'indonesia'],
            ['title' => 'Bulan', 'isbn' => '978-602-03-1586-5', 'author' => 'Tere Liye', 'published_year' => 2015, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image8.jpg', 'stock' => 25, 'rental_price' => 8500, 'language' => 'indonesia'],
            ['title' => 'Hujan', 'isbn' => '978-602-03-1951-1', 'author' => 'Tere Liye', 'published_year' => 2016, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image9.jpg', 'stock' => 30, 'rental_price' => 9500, 'language' => 'indonesia'],
            ['title' => 'Pulang', 'isbn' => '978-602-291-054-2', 'author' => 'Leila S. Chudori', 'published_year' => 2012, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image10.jpg', 'stock' => 7, 'rental_price' => 10500, 'language' => 'indonesia'],
            ['title' => 'Supernova', 'isbn' => '978-979-22-5873-2', 'author' => 'Dee Lestari', 'published_year' => 2001, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image11.jpg', 'stock' => 13, 'rental_price' => 11500, 'language' => 'indonesia'],
            ['title' => 'Padang Bulan', 'isbn' => '978-979-780-485-7', 'author' => 'Andrea Hirata', 'published_year' => 2010, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image12.jpg', 'stock' => 17, 'rental_price' => 12500, 'language' => 'indonesia'],
            ['title' => 'Edensor', 'isbn' => '978-979-780-336-2', 'author' => 'Andrea Hirata', 'published_year' => 2007, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image13.jpg', 'stock' => 6, 'rental_price' => 13500, 'language' => 'indonesia'],
            ['title' => 'Maryamah Karpov', 'isbn' => '978-979-780-323-2', 'author' => 'Andrea Hirata', 'published_year' => 2008, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image14.jpg', 'stock' => 11, 'rental_price' => 14500, 'language' => 'indonesia'],
            ['title' => 'Dari Ave Maria ke Jalan Lain ke Roma', 'isbn' => '978-979-3062-98-7', 'author' => 'Idrus', 'published_year' => 1948, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image15.jpg', 'stock' => 17, 'rental_price' => 15500, 'language' => 'indonesia'],
            ['title' => 'Gadis Pantai', 'isbn' => '978-979-97312-1-5', 'author' => 'Pramoedya Ananta Toer', 'published_year' => 1965, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image16.jpg', 'stock' => 4, 'rental_price' => 16500, 'language' => 'indonesia'],
            ['title' => 'O', 'isbn' => '978-602-03-1950-4', 'author' => 'Dee Lestari', 'published_year' => 2016, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image17.jpg', 'stock' => 16, 'rental_price' => 17500, 'language' => 'indonesia'],
            ['title' => 'Para Priyayi', 'isbn' => '978-979-22-1487-5', 'author' => 'Umar Kayam', 'published_year' => 1992, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image18.jpg', 'stock' => 14, 'rental_price' => 18500, 'language' => 'indonesia'],
            ['title' => 'Max Havelaar', 'isbn' => '978-979-1107-18-0', 'author' => 'Multatuli', 'published_year' => 1860, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image19.jpg', 'stock' => 10, 'rental_price' => 10500, 'language' => 'indonesia'],
            ['title' => 'Manusia Langit', 'isbn' => '978-602-03-1587-2', 'author' => 'Tere Liye', 'published_year' => 2015, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image20.jpg', 'stock' => 5, 'rental_price' => 7500, 'language' => 'indonesia'],
            ['title' => 'Orang-Orang Biasa', 'isbn' => '978-602-03-2356-3', 'author' => 'Andrea Hirata', 'published_year' => 2019, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image21.jpg', 'stock' => 8, 'rental_price' => 8500, 'language' => 'indonesia'],
            ['title' => 'Bumi', 'isbn' => '978-602-03-0485-1', 'author' => 'Tere Liye', 'published_year' => 2014, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image22.jpg', 'stock' => 7, 'rental_price' => 5000, 'language' => 'indonesia'],
            ['title' => 'Anak Semua Bangsa', 'isbn' => '978-979-97312-4-6', 'author' => 'Pramoedya Ananta Toer', 'published_year' => 1981, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image23.jpg', 'stock' => 15, 'rental_price' => 6000, 'language' => 'indonesia'],
            ['title' => 'Aroma Karsa', 'isbn' => '978-602-03-3564-0', 'author' => 'Dee Lestari', 'published_year' => 2018, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image24.jpg', 'stock' => 8, 'rental_price' => 4500, 'language' => 'indonesia'],
            ['title' => 'Pintu Terlarang', 'isbn' => '978-979-3062-73-4', 'author' => 'Sekar Ayu Asmara', 'published_year' => 2001, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image25.jpg', 'stock' => 10, 'rental_price' => 5000, 'language' => 'indonesia'],
            ['title' => 'Lelaki Harimau', 'isbn' => '978-979-27-9535-1', 'author' => 'Eka Kurniawan', 'published_year' => 2004, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image26.jpg', 'stock' => 5, 'rental_price' => 5500, 'language' => 'indonesia'],
            ['title' => 'Cantik Itu Luka', 'isbn' => '978-979-22-3281-5', 'author' => 'Eka Kurniawan', 'published_year' => 2002, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image27.jpg', 'stock' => 7, 'rental_price' => 6500, 'language' => 'indonesia'],
            ['title' => 'Gajah Mada', 'isbn' => '978-979-22-8383-6', 'author' => 'Langit Kresna Hariadi', 'published_year' => 2005, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image28.jpg', 'stock' => 12, 'rental_price' => 7500, 'language' => 'indonesia'],
            ['title' => 'Filosofi Kopi', 'isbn' => '978-979-22-1758-9', 'author' => 'Dee Lestari', 'published_year' => 2006, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image29.jpg', 'stock' => 18, 'rental_price' => 8500, 'language' => 'indonesia'],
            ['title' => 'Perempuan Berkalung Sorban', 'isbn' => '978-979-22-5283-2', 'author' => 'Abidah El Khalieqy', 'published_year' => 2001, 'category_id' => 1, 'publisher_id' => 1, 'cover_image' => 'path/to/cover/image30.jpg', 'stock' => 20, 'rental_price' => 9500, 'language' => 'indonesia'],

            // Buku Bahasa Inggris (5)
            ['title' => 'To Kill a Mockingbird', 'isbn' => '978-0-06-112008-4', 'author' => 'Harper Lee', 'published_year' => 1960, 'category_id' => 2, 'publisher_id' => 2, 'cover_image' => 'path/to/cover/image31.jpg', 'stock' => 10, 'rental_price' => 5000, 'language' => 'inggris'],
            ['title' => '1984', 'isbn' => '978-0-452-28423-4', 'author' => 'George Orwell', 'published_year' => 1949, 'category_id' => 2, 'publisher_id' => 3, 'cover_image' => 'path/to/cover/image32.jpg', 'stock' => 15, 'rental_price' => 6000, 'language' => 'inggris'],
            ['title' => 'The Great Gatsby', 'isbn' => '978-0-7432-7356-5', 'author' => 'F. Scott Fitzgerald', 'published_year' => 1925, 'category_id' => 2, 'publisher_id' => 4, 'cover_image' => 'path/to/cover/image33.jpg', 'stock' => 12, 'rental_price' => 6500, 'language' => 'inggris'],
            ['title' => 'Pride and Prejudice', 'isbn' => '978-0-19-953556-9', 'author' => 'Jane Austen', 'published_year' => 1813, 'category_id' => 2, 'publisher_id' => 5, 'cover_image' => 'path/to/cover/image34.jpg', 'stock' => 8, 'rental_price' => 7000, 'language' => 'inggris'],
            ['title' => 'The Catcher in the Rye', 'isbn' => '978-0-316-76948-0', 'author' => 'J.D. Salinger', 'published_year' => 1951, 'category_id' => 2, 'publisher_id' => 6, 'cover_image' => 'path/to/cover/image35.jpg', 'stock' => 10, 'rental_price' => 5000, 'language' => 'inggris'],

            // Buku Bahasa Mandarin (3)
            ['title' => '活着', 'isbn' => '978-7-5321-3533-2', 'author' => '余华', 'published_year' => 1993, 'category_id' => 2, 'publisher_id' => 7, 'cover_image' => 'path/to/cover/image36.jpg', 'stock' => 8, 'rental_price' => 4500, 'language' => 'mandarin'],
            ['title' => '狼图腾', 'isbn' => '978-7-101-04823-4', 'author' => '姜戎', 'published_year' => 2004, 'category_id' => 2, 'publisher_id' => 7, 'cover_image' => 'path/to/cover/image37.jpg', 'stock' => 5, 'rental_price' => 6000, 'language' => 'mandarin'],
            ['title' => '围城', 'isbn' => '978-7-5321-2534-9', 'author' => '钱钟书', 'published_year' => 1947, 'category_id' => 2, 'publisher_id' => 7, 'cover_image' => 'path/to/cover/image38.jpg', 'stock' => 7, 'rental_price' => 5500, 'language' => 'mandarin'],

            // Buku Bahasa Jepang (2)
            ['title' => 'ノルウェイの森', 'isbn' => '978-4-10-101001-4', 'author' => '村上春樹', 'published_year' => 1987, 'category_id' => 2, 'publisher_id' => 8, 'cover_image' => 'path/to/cover/image39.jpg', 'stock' => 5, 'rental_price' => 5000, 'language' => 'jepang'],
            ['title' => '吾輩は猫である', 'isbn' => '978-4-10-102001-2', 'author' => '夏目漱石', 'published_year' => 1905, 'category_id' => 2, 'publisher_id' => 8, 'cover_image' => 'path/to/cover/image40.jpg', 'stock' => 3, 'rental_price' => 6000, 'language' => 'jepang'],

            // Buku Bahasa Arab (5)
            ['title' => 'الأيام', 'isbn' => '978-977-313-013-8', 'author' => 'طه حسين', 'published_year' => 1929, 'category_id' => 2, 'publisher_id' => 14, 'cover_image' => 'path/to/cover/image41.jpg', 'stock' => 7, 'rental_price' => 5500, 'language' => 'arab'],
            ['title' => 'ألف ليلة وليلة', 'isbn' => '978-0-14-044938-9', 'author' => 'غير معروف', 'published_year' => 1706, 'category_id' => 2, 'publisher_id' => 14, 'cover_image' => 'path/to/cover/image42.jpg', 'stock' => 6, 'rental_price' => 6000, 'language' => 'arab'],
            ['title' => 'رجال في الشمس', 'isbn' => '978-9953-0-0074-8', 'author' => 'غسان كنفاني', 'published_year' => 1963, 'category_id' => 2, 'publisher_id' => 14, 'cover_image' => 'path/to/cover/image43.jpg', 'stock' => 8, 'rental_price' => 6500, 'language' => 'arab'],
            ['title' => 'موسم الهجرة إلى الشمال', 'isbn' => '978-977-09-2334-2', 'author' => 'الطيب صالح', 'published_year' => 1966, 'category_id' => 2, 'publisher_id' => 14, 'cover_image' => 'path/to/cover/image44.jpg', 'stock' => 4, 'rental_price' => 5000, 'language' => 'arab'],
            ['title' => 'كليلة ودمنة', 'isbn' => '978-9953-0-2063-0', 'author' => 'ابن المقفع', 'published_year' => 750, 'category_id' => 2, 'publisher_id' => 14, 'cover_image' => 'path/to/cover/image45.jpg', 'stock' => 9, 'rental_price' => 7000, 'language' => 'arab'],

            // Buku Bahasa Perancis (1)
            ['title' => 'Le Petit Prince', 'isbn' => '978-2-07-061275-8', 'author' => 'Antoine de Saint-Exupéry', 'published_year' => 1943, 'category_id' => 2, 'publisher_id' => 10, 'cover_image' => 'path/to/cover/image46.jpg', 'stock' => 6, 'rental_price' => 6000, 'language' => 'perancis'],

            // Buku Lain-Lain (4)
            ['title' => 'Don Quixote', 'isbn' => '978-84-376-0494-7', 'author' => 'Miguel de Cervantes', 'published_year' => 1605, 'category_id' => 2, 'publisher_id' => 11, 'cover_image' => 'path/to/cover/image47.jpg', 'stock' => 4, 'rental_price' => 6500, 'language' => 'spanyol'],
            ['title' => 'War and Peace', 'isbn' => '978-0-14-303999-0', 'author' => 'Leo Tolstoy', 'published_year' => 1869, 'category_id' => 2, 'publisher_id' => 2, 'cover_image' => 'path/to/cover/image48.jpg', 'stock' => 3, 'rental_price' => 7000, 'language' => 'rusia'],
            ['title' => 'The Alchemist', 'isbn' => '978-0-06-231500-8', 'author' => 'Paulo Coelho', 'published_year' => 1988, 'category_id' => 2, 'publisher_id' => 2, 'cover_image' => 'path/to/cover/image49.jpg', 'stock' => 12, 'rental_price' => 7500, 'language' => 'portugis'],
            ['title' => 'The Brothers Karamazov', 'isbn' => '978-0-375-76098-3', 'author' => 'Fyodor Dostoevsky', 'published_year' => 1880, 'category_id' => 2, 'publisher_id' => 2, 'cover_image' => 'path/to/cover/image50.jpg', 'stock' => 6, 'rental_price' => 8000, 'language' => 'rusia'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }

}