<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun 1: Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@akademik.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Akun 2: Dosen
        User::create([
            'name' => 'Dosen Satu',
            'email' => 'dosen@akademik.test',
            'password' => Hash::make('password'),
            'role' => 'dosen',
        ]);

        // Akun 3: Mahasiswa
        User::create([
            'name' => 'Mahasiswa Satu',
            'email' => 'mahasiswa@akademik.test',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
    }
}