<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil UserSeeder untuk membuat 3 akun
        $this->call([
            UserSeeder::class,
        ]);
    }
}