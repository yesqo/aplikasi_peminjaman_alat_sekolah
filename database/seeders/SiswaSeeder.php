<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('siswas')->insert([
            [
                'nis' => '2026001',
                'nama_siswa' => 'Rehan',
                'kelas' => 'XII PPLG 3',
                'no_telp' => '081234567890',
                'username' => 'rehan',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nis' => '2026002',
                'nama_siswa' => 'Irsyad',
                'kelas' => 'XII PPLG 3',
                'no_telp' => '081298765432',
                'username' => 'irsyad',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nis' => '2026003',
                'nama_siswa' => 'Habib',
                'kelas' => 'XII PPLG 3',
                'no_telp' => '081212345678',
                'username' => 'habib',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nis' => '2026004',
                'nama_siswa' => 'Zhafif',
                'kelas' => 'XII PPLG 3',
                'no_telp' => '081234567891',
                'username' => 'zhafif',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nis' => '2026005',
                'nama_siswa' => 'Fitrul',
                'kelas' => 'XII PPLG 3',
                'no_telp' => '081234567892',
                'username' => 'fitrul',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
