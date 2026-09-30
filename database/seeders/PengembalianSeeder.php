<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengembalianSeeder extends Seeder
{
    public function run(): void
    {
        $laptop = DB::table('alats')->where('nama_alat', 'Laptop Acer')->value('id');
        $bolaBasket = DB::table('alats')->where('nama_alat', 'Bola Basket')->value('id');

        $pinjamLaptop = DB::table('peminjamans')
            ->where('id_alat', $laptop)
            ->where('status', 'Dikembalikan Sebagian')
            ->value('id');

        $pinjamBolaBasket = DB::table('peminjamans')
            ->where('id_alat', $bolaBasket)
            ->where('status', 'Dikembalikan')
            ->value('id');

        DB::table('pengembalians')->insert([
            // Laptop Acer - 1 unit sudah dikonfirmasi petugas
            [
                'id_peminjaman' => $pinjamLaptop,
                'tanggal_pengembalian' => now()->subDay()->format('Y-m-d'),
                'jumlah' => 1,
                'status' => 'Dikonfirmasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Laptop Acer - ada klaim susulan 1 unit lagi, masih menunggu konfirmasi petugas
            [
                'id_peminjaman' => $pinjamLaptop,
                'tanggal_pengembalian' => now()->format('Y-m-d'),
                'jumlah' => 1,
                'status' => 'Menunggu Konfirmasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Bola Basket - dikembalikan penuh 2/2, sudah dikonfirmasi
            [
                'id_peminjaman' => $pinjamBolaBasket,
                'tanggal_pengembalian' => now()->subDays(5)->format('Y-m-d'),
                'jumlah' => 2,
                'status' => 'Dikonfirmasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
