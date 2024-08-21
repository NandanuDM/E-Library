<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;

class ApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applications = [
            'name' => 'E-Library', 
            'description' => 'Ketika anda butuh form penyewaan baru, manajemen anggota perpustakaan, laporan status perpustakaan,
                E-Library siap membantu anda', 
            'email' => 'e_library@example.com', 
            'phone' => '081234567890', 
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'linkedin' => null,
        ];
        Application::create($applications);
    }
}
