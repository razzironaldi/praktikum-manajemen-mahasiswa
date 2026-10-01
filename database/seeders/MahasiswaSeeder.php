<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswas = [
            [
                'nim' => '25781020',
                'nama' => 'Razzi Ronaldi',
                'program_studi' => 'Manajemen Informatika',
                'email' => 'razzi.ronaldi@example.com',
                'angkatan' => 2025,
            ],
            [
                'nim' => '25781021',
                'nama' => 'Budi Santoso',
                'program_studi' => 'Teknik Informatika',
                'email' => 'budi.santoso@example.com',
                'angkatan' => 2025,
            ],
            [
                'nim' => '25781022',
                'nama' => 'Siti Aminah',
                'program_studi' => 'Sistem Informasi',
                'email' => 'siti.aminah@example.com',
                'angkatan' => 2025,
            ],
            [
                'nim' => '24781015',
                'nama' => 'Ahmad Fauzi',
                'program_studi' => 'Manajemen Informatika',
                'email' => 'ahmad.fauzi@example.com',
                'angkatan' => 2024,
            ],
            [
                'nim' => '24781016',
                'nama' => 'Dewi Lestari',
                'program_studi' => 'Teknik Informatika',
                'email' => 'dewi.lestari@example.com',
                'angkatan' => 2024,
            ],
        ];

        foreach ($mahasiswas as $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }
    }
}
