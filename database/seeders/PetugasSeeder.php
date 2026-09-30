<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('petugas')->insert([
            'nama_petugas' => 'Yessa',
            'username' => 'yessaadmin',
            'password' => bcrypt('admin123#'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('petugas')->insert([
            'nama_petugas' => 'Qoiry',
            'username' => 'qoiryadmin',
            'password' => bcrypt('admin123#'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
