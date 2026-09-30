<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Alat Elektronik', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Alat Olahraga', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Alat Kebersihan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Alat Komputer', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
