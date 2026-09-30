<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlatSeeder extends Seeder
{
    public function run(): void
    {
        $komputer = DB::table('kategoris')->where('nama_kategori', 'Alat Komputer')->value('id');
        $elektronik = DB::table('kategoris')->where('nama_kategori', 'Alat Elektronik')->value('id');
        $kebersihan = DB::table('kategoris')->where('nama_kategori', 'Alat Kebersihan')->value('id');
        $olahraga = DB::table('kategoris')->where('nama_kategori', 'Alat Olahraga')->value('id');

        DB::table('alats')->insert([
            [
                'gambar' => 'acerpredator.jpg',
                'id_kategori' => $komputer,
                'nama_alat' => 'Laptop Acer',
                'stok' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'monitor.jpg',
                'id_kategori' => $komputer,
                'nama_alat' => 'Monitor',
                'stok' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'mouse.jpg',
                'id_kategori' => $komputer,
                'nama_alat' => 'Mouse',
                'stok' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'keyboard.jpg',
                'id_kategori' => $komputer,
                'nama_alat' => 'Keyboard',
                'stok' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'webcam.jpg',
                'id_kategori' => $komputer,
                'nama_alat' => 'Webcam',
                'stok' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'proyektor.jpg',
                'id_kategori' => $elektronik,
                'nama_alat' => 'Proyektor',
                'stok' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'kabelhdmi.jpg',
                'id_kategori' => $elektronik,
                'nama_alat' => 'Kabel HDMI',
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'kabelvga.jpg',
                'id_kategori'=> $elektronik,
                'nama_alat'=> 'Kabel VGA',
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'microphone.jpg',
                'id_kategori'=> $elektronik,
                'nama_alat'=> 'Microphone',
                'stok' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'speaker.jpg',
                'id_kategori'=> $elektronik,
                'nama_alat'=> 'Speaker',
                'stok' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'sapuijuk.jpg',
                'id_kategori'=> $kebersihan,
                'nama_alat'=> 'Sapu Ijuk',
                'stok' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'sapulidi.jpg',
                'id_kategori'=> $kebersihan,
                'nama_alat'=> 'Sapu Lidi',
                'stok' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'pengki.jpg',
                'id_kategori'=> $kebersihan,
                'nama_alat'=> 'Serokan Sampah(Pengki)',
                'stok' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'pellantai.jpg',
                'id_kategori'=> $kebersihan,
                'nama_alat'=> 'Pel Lantai',
                'stok' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'ember.jpg',
                'id_kategori'=> $kebersihan,
                'nama_alat'=> 'Ember',
                'stok' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'bola.jpg',
                'id_kategori'=> $olahraga,
                'nama_alat'=> 'Bola Futsal',
                'stok' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'bolabasket.jpg',
                'id_kategori'=> $olahraga,
                'nama_alat'=> 'Bola Basket',
                'stok' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'bolavoli.jpg',
                'id_kategori'=> $olahraga,
                'nama_alat'=> 'Bola Voli',
                'stok' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'raketbadminton.jpg',
                'id_kategori'=> $olahraga,
                'nama_alat'=> 'Raket Badminton',
                'stok' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar'=> 'matrassenam.jpg',
                'id_kategori'=> $olahraga,
                'nama_alat'=> 'Matras Senam',
                'stok' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
