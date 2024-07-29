<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MembersTableSeeder extends Seeder
{
    /**
     * Generate a unique phone number.
     *
     * @return string
     */
    public function generateUniquePhoneNumber()
    {
        $prefixes = ['0812', '0813', '0858', '0852', '0878', '0821'];

        do {
            $prefix = $prefixes[array_rand($prefixes)];
            $phoneNumber = $prefix . mt_rand(1000000, 9999999);
        } while (Member::where('phone', $phoneNumber)->exists());

        return $phoneNumber;
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = [
            ['full_name' => 'Andi Susanto', 'address' => 'Jl. Sudirman No. 45, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'andi.susanto@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Budi Santoso', 'address' => 'Jl. Thamrin No. 12, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'budi.santoso@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Cindy Wijaya', 'address' => 'Jl. Merdeka No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'cindy.wijaya@example.com', 'type' => 'dosen'],
            ['full_name' => 'Dewi Putri', 'address' => 'Jl. Diponegoro No. 21, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'dewi.putri@example.com', 'type' => 'guru'],
            ['full_name' => 'Eka Pratama', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'eka.pratama@example.com', 'type' => 'umum'],
            ['full_name' => 'Fadli Rahman', 'address' => 'Jl. Pahlawan No. 23, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'fadli.rahman@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Gita Saraswati', 'address' => 'Jl. Diponegoro No. 78, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'gita.saraswati@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Hendra Gunawan', 'address' => 'Jl. Juanda No. 45, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'hendra.gunawan@example.com', 'type' => 'dosen'],
            ['full_name' => 'Ika Nurjanah', 'address' => 'Jl. Sudirman No. 90, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'ika.nurjanah@example.com', 'type' => 'guru'],
            ['full_name' => 'Joko Widodo', 'address' => 'Jl. Merdeka No. 11, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'joko.widodo@example.com', 'type' => 'umum'],
            ['full_name' => 'Kiki Amelia', 'address' => 'Jl. Ahmad Yani No. 67, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'kiki.amelia@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Lukman Hakim', 'address' => 'Jl. Diponegoro No. 98, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'lukman.hakim@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Maya Sari', 'address' => 'Jl. Gatot Subroto No. 45, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'maya.sari@example.com', 'type' => 'dosen'],
            ['full_name' => 'Nina Agustin', 'address' => 'Jl. Pahlawan No. 34, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'nina.agustin@example.com', 'type' => 'guru'],
            ['full_name' => 'Oki Setiawan', 'address' => 'Jl. Sudirman No. 12, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'oki.setiawan@example.com', 'type' => 'umum'],
            ['full_name' => 'Putu Arya', 'address' => 'Jl. Ahmad Yani No. 78, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'putu.arya@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Qori Ahmad', 'address' => 'Jl. Diponegoro No. 56, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'qori.ahmad@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Rina Permata', 'address' => 'Jl. Gatot Subroto No. 23, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'rina.permata@example.com', 'type' => 'dosen'],
            ['full_name' => 'Susi Susanti', 'address' => 'Jl. Pahlawan No. 78, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'susi.susanti@example.com', 'type' => 'guru'],
            ['full_name' => 'Toni Wijaya', 'address' => 'Jl. Merdeka No. 45, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'toni.wijaya@example.com', 'type' => 'umum'],
            ['full_name' => 'Umar Bakri', 'address' => 'Jl. Ahmad Yani No. 90, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'umar.bakri@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Vina Aulia', 'address' => 'Jl. Diponegoro No. 34, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'vina.aulia@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Wawan Setiawan', 'address' => 'Jl. Gatot Subroto No. 67, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'wawan.setiawan@example.com', 'type' => 'dosen'],
            ['full_name' => 'Xenia Pratama', 'address' => 'Jl. Pahlawan No. 90, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'xenia.pratama@example.com', 'type' => 'guru'],
            ['full_name' => 'Yosef Hadi', 'address' => 'Jl. Merdeka No. 67, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'yosef.hadi@example.com', 'type' => 'umum'],
            ['full_name' => 'Zahra Putri', 'address' => 'Jl. Ahmad Yani No. 12, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'zahra.putri@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Agus Setiawan', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'agus.setiawan@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Bambang Triyono', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'bambang.triyono@example.com', 'type' => 'dosen'],
            ['full_name' => 'Cahya Dewi', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'cahya.dewi@example.com', 'type' => 'guru'],
            ['full_name' => 'Doni Saputra', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'doni.saputra@example.com', 'type' => 'umum'],
            ['full_name' => 'Euis Sulastri', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'euis.sulastri@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Farid Hidayat', 'address' => 'Jl. Diponegoro No. 45, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'farid.hidayat@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Gilang Ramadhan', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'gilang.ramadhan@example.com', 'type' => 'dosen'],
            ['full_name' => 'Heri Susanto', 'address' => 'Jl. Pahlawan No. 45, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'heri.susanto@example.com', 'type' => 'guru'],
            ['full_name' => 'Intan Permatasari', 'address' => 'Jl. Merdeka No. 78, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'intan.permatasari@example.com', 'type' => 'umum'],
            ['full_name' => 'Junaedi Putra', 'address' => 'Jl. Ahmad Yani No. 12, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'junaedi.putra@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Kirana Andini', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'kirana.andini@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Lukito Rahardjo', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'lukito.rahardjo@example.com', 'type' => 'dosen'],
            ['full_name' => 'Mega Pratiwi', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'mega.pratiwi@example.com', 'type' => 'guru'],
            ['full_name' => 'Nugroho Santoso', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'nugroho.santoso@example.com', 'type' => 'umum'],
            ['full_name' => 'Oktaviani Dewi', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'oktaviani.dewi@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Putra Mahardika', 'address' => 'Jl. Diponegoro No. 45, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'putra.mahardika@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Rafli Akbar', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'rafli.akbar@example.com', 'type' => 'dosen'],
            ['full_name' => 'Sari Utami', 'address' => 'Jl. Pahlawan No. 45, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'sari.utami@example.com', 'type' => 'guru'],
            ['full_name' => 'Taufik Hidayat', 'address' => 'Jl. Merdeka No. 78, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'taufik.hidayat@example.com', 'type' => 'umum'],
            ['full_name' => 'Umi Kalsum', 'address' => 'Jl. Ahmad Yani No. 12, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'umi.kalsum@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Vino Ramadhan', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'vino.ramadhan@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Widya Saraswati', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'widya.saraswati@example.com', 'type' => 'dosen'],
            ['full_name' => 'Xander Pratama', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'xander.pratama@example.com', 'type' => 'guru'],
            ['full_name' => 'Yuni Susanti', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'yuni.susanti@example.com', 'type' => 'umum'],
            ['full_name' => 'Zaki Maulana', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'zaki.maulana@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Aisyah Rahma', 'address' => 'Jl. Diponegoro No. 45, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'aisyah.rahma@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Beni Pratama', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'beni.pratama@example.com', 'type' => 'dosen'],
            ['full_name' => 'Citra Dewi', 'address' => 'Jl. Pahlawan No. 45, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'citra.dewi@example.com', 'type' => 'guru'],
            ['full_name' => 'Dedi Susanto', 'address' => 'Jl. Merdeka No. 78, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'dedi.susanto@example.com', 'type' => 'umum'],
            ['full_name' => 'Erwin Santoso', 'address' => 'Jl. Ahmad Yani No. 12, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'erwin.santoso@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Farida Sari', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'farida.sari@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Gusti Ramadhan', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'gusti.ramadhan@example.com', 'type' => 'dosen'],
            ['full_name' => 'Helmi Susanto', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'helmi.susanto@example.com', 'type' => 'guru'],
            ['full_name' => 'Indra Pratama', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'indra.pratama@example.com', 'type' => 'umum'],
            ['full_name' => 'Jasmine Amelia', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'jasmine.amelia@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Kurniawan Setiawan', 'address' => 'Jl. Diponegoro No. 45, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'kurniawan.setiawan@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Lusi Anggraini', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'lusi.anggraini@example.com', 'type' => 'dosen'],
            ['full_name' => 'Meli Susanti', 'address' => 'Jl. Pahlawan No. 45, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'meli.susanti@example.com', 'type' => 'guru'],
            ['full_name' => 'Nina Pratiwi', 'address' => 'Jl. Merdeka No. 78, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'nina.pratiwi@example.com', 'type' => 'umum'],
            ['full_name' => 'Oki Setiawan', 'address' => 'Jl. Ahmad Yani No. 12, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'oki.setiawan@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Putri Ayu', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'putri.ayu@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Rizki Pratama', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'rizki.pratama@example.com', 'type' => 'dosen'],
            ['full_name' => 'Siti Nurjanah', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'siti.nurjanah@example.com', 'type' => 'guru'],
            ['full_name' => 'Tomi Susanto', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'tomi.susanto@example.com', 'type' => 'umum'],
            ['full_name' => 'Uli Anggraini', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'uli.anggraini@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Vivi Setiawan', 'address' => 'Jl. Diponegoro No. 45, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'vivi.setiawan@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Wahyu Susanto', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'wahyu.susanto@example.com', 'type' => 'dosen'],
            ['full_name' => 'Xena Amelia', 'address' => 'Jl. Pahlawan No. 45, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'xena.amelia@example.com', 'type' => 'guru'],
            ['full_name' => 'Yudha Setiawan', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'yudha.setiawan@example.com', 'type' => 'umum'],
            ['full_name' => 'Zulfa Pratama', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'zulfa.pratama@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Aldi Pratama', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'aldi.pratama@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Bambang Prasetyo', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'bambang.prasetyo@example.com', 'type' => 'dosen'],
            ['full_name' => 'Cici Amelia', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'cici.amelia@example.com', 'type' => 'guru'],
            ['full_name' => 'Deni Setiawan', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'deni.setiawan@example.com', 'type' => 'umum'],
            ['full_name' => 'Eka Sari', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'eka.sari@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Farhan Pratama', 'address' => 'Jl. Diponegoro No. 45, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'farhan.pratama@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Guntur Hidayat', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'guntur.hidayat@example.com', 'type' => 'dosen'],
            ['full_name' => 'Hani Dewi', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'hani.dewi@example.com', 'type' => 'guru'],
            ['full_name' => 'Indra Prasetyo', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'indra.prasetyo@example.com', 'type' => 'umum'],
            ['full_name' => 'Joko Pratama', 'address' => 'Jl. Ahmad Yani No. 12, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'joko.pratama@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Kiki Sari', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'kiki.sari@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Lala Hidayat', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'lala.hidayat@example.com', 'type' => 'dosen'],
            ['full_name' => 'Mega Prasetyo', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'mega.prasetyo@example.com', 'type' => 'guru'],
            ['full_name' => 'Nina Sari', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'nina.sari@example.com', 'type' => 'umum'],
            ['full_name' => 'Omar Pratama', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'omar.pratama@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Putra Prasetyo', 'address' => 'Jl. Diponegoro No. 45, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'putra.prasetyo@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Rizki Hidayat', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'rizki.hidayat@example.com', 'type' => 'dosen'],
            ['full_name' => 'Sari Pratama', 'address' => 'Jl. Pahlawan No. 45, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'sari.pratama@example.com', 'type' => 'guru'],
            ['full_name' => 'Tomi Sari', 'address' => 'Jl. Merdeka No. 78, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'tomi.sari@example.com', 'type' => 'umum'],
            ['full_name' => 'Umar Pratama', 'address' => 'Jl. Ahmad Yani No. 12, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'umar.pratama@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Vina Sari', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'vina.sari@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Wawan Pratama', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'wawan.pratama@example.com', 'type' => 'dosen'],
            ['full_name' => 'Xena Sari', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'xena.sari@example.com', 'type' => 'guru'],
            ['full_name' => 'Yuda Pratama', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'yuda.pratama@example.com', 'type' => 'umum'],
            ['full_name' => 'Zahra Sari', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'zahra.sari@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Agus Pratama', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'agus.pratama@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Budi Sari', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'budi.sari@example.com', 'type' => 'dosen'],
            ['full_name' => 'Cici Pratama', 'address' => 'Jl. Pahlawan No. 45, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'cici.pratama@example.com', 'type' => 'guru'],
            ['full_name' => 'Dedi Sari', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'dedi.sari@example.com', 'type' => 'umum'],
            ['full_name' => 'Erna Pratama', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'erna.pratama@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Farida Sari', 'address' => 'Jl. Diponegoro No. 45, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'farida.sari@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Gilang Pratama', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'gilang.pratama@example.com', 'type' => 'dosen'],
            ['full_name' => 'Hani Sari', 'address' => 'Jl. Pahlawan No. 45, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'hani.sari@example.com', 'type' => 'guru'],
            ['full_name' => 'Indra Pratama', 'address' => 'Jl. Merdeka No. 78, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'indra.pratama@example.com', 'type' => 'umum'],
            ['full_name' => 'Joko Sari', 'address' => 'Jl. Ahmad Yani No. 12, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'joko.sari@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Kiki Pratama', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'kiki.pratama@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Lala Sari', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'lala.sari@example.com', 'type' => 'dosen'],
            ['full_name' => 'Mega Pratama', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'mega.pratama@example.com', 'type' => 'guru'],
            ['full_name' => 'Nina Sari', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'nina.sari@example.com', 'type' => 'umum'],
            ['full_name' => 'Omar Pratama', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'omar.pratama@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Putra Sari', 'address' => 'Jl. Diponegoro No. 45, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'putra.sari@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Rizki Pratama', 'address' => 'Jl. Gatot Subroto No. 12, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'rizki.pratama@example.com', 'type' => 'dosen'],
            ['full_name' => 'Sari Pratama', 'address' => 'Jl. Pahlawan No. 45, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'sari.pratama@example.com', 'type' => 'guru'],
            ['full_name' => 'Tomi Pratama', 'address' => 'Jl. Merdeka No. 78, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'tomi.pratama@example.com', 'type' => 'umum'],
            ['full_name' => 'Umar Sari', 'address' => 'Jl. Ahmad Yani No. 12, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'umar.sari@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Vina Pratama', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'vina.pratama@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Wawan Sari', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'wawan.sari@example.com', 'type' => 'dosen'],
            ['full_name' => 'Xena Pratama', 'address' => 'Jl. Pahlawan No. 12, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'xena.pratama@example.com', 'type' => 'guru'],
            ['full_name' => 'Yuda Sari', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'yuda.sari@example.com', 'type' => 'umum'],
            ['full_name' => 'Zahra Pratama', 'address' => 'Jl. Ahmad Yani No. 34, Bandung', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'zahra.pratama@example.com', 'type' => 'pelajar'],
            ['full_name' => 'Agus Sari', 'address' => 'Jl. Diponegoro No. 90, Surabaya', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'agus.sari@example.com', 'type' => 'mahasiswa'],
            ['full_name' => 'Budi Pratama', 'address' => 'Jl. Gatot Subroto No. 56, Yogyakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'budi.pratama@example.com', 'type' => 'dosen'],
            ['full_name' => 'Cici Sari', 'address' => 'Jl. Pahlawan No. 45, Medan', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'cici.sari@example.com', 'type' => 'guru'],
            ['full_name' => 'Dedi Pratama', 'address' => 'Jl. Merdeka No. 90, Jakarta', 'phone' => $this->generateUniquePhoneNumber(), 'email' => 'dedi.pratama@example.com', 'type' => 'umum'],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}
