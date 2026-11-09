<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Category;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'Admin', 'password' => 'password', 'role' => 'admin'],
        );

        User::updateOrCreate(
            ['email' => 'siswa@gmail.com'],
            [
                'name' => 'Eluhuy',
                'password' => 'password',
                'role' => 'siswa',
                'nis' => '123123',
                'kelas' => 'XII RPL',
            ],
        );

        Siswa::updateOrCreate(
            ['nisn' => '123123'],
            ['nama' => 'Eluhuy', 'kelas' => 'XII RPL'],
        );

        foreach (['Ruang kelas', 'Toilet', 'Laboratorium', 'Lapangan'] as $nama) {
            Category::updateOrCreate(['nama' => $nama]);
        }
    }
}
