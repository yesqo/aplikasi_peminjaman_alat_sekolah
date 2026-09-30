<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $siswaIds = DB::table('siswas')->orderBy('id')->pluck('id')->toArray();
        $siswa1 = $siswaIds[0] ?? null;
        $siswa2 = $siswaIds[1] ?? $siswa1;
        $siswa3 = $siswaIds[2] ?? $siswa1;
        $siswa4 = $siswaIds[3] ?? $siswa1;

        $petugasId = DB::table('petugas')->orderBy('id')->value('id');

        $proyektor = DB::table('alats')->where('nama_alat', 'Proyektor')->value('id');
        $monitor = DB::table('alats')->where('nama_alat', 'Monitor')->value('id');
        $laptop = DB::table('alats')->where('nama_alat', 'Laptop Acer')->value('id');
        $bolaBasket = DB::table('alats')->where('nama_alat', 'Bola Basket')->value('id');

        DB::table('peminjamans')->insert([
            // 1. Baru diajukan siswa, belum diproses petugas sama sekali
            [
                'id_siswa' => $siswa1,
                'id_alat' => $proyektor,
                'id_petugas' => null,
                'tanggal_peminjaman' => now()->format('Y-m-d'),
                'tanggal_rencana_kembali' => now()->addDays(5)->format('Y-m-d'),
                'jumlah' => 1,
                'status' => 'Menunggu Persetujuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2. Sudah disetujui petugas, masih dipinjam penuh, belum ada pengembalian sama sekali
            [
                'id_siswa' => $siswa4,
                'id_alat' => $monitor,
                'id_petugas' => $petugasId,
                'tanggal_peminjaman' => now()->subDays(2)->format('Y-m-d'),
                'tanggal_rencana_kembali' => now()->addDays(3)->format('Y-m-d'),
                'jumlah' => 2,
                'status' => 'Dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 3. Sudah disetujui petugas, baru dikembalikan sebagian (1 dari 3)
            [
                'id_siswa' => $siswa2,
                'id_alat' => $laptop,
                'id_petugas' => $petugasId,
                'tanggal_peminjaman' => now()->subDays(6)->format('Y-m-d'),
                'tanggal_rencana_kembali' => now()->subDay()->format('Y-m-d'),
                'jumlah' => 3,
                'status' => 'Dikembalikan Sebagian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 4. Sudah dikembalikan penuh (2 dari 2)
            [
                'id_siswa' => $siswa3,
                'id_alat' => $bolaBasket,
                'id_petugas' => $petugasId,
                'tanggal_peminjaman' => now()->subDays(10)->format('Y-m-d'),
                'tanggal_rencana_kembali' => now()->subDays(5)->format('Y-m-d'),
                'jumlah' => 2,
                'status' => 'Dikembalikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Monitor: 2 unit dipinjam, belum ada yang kembali sama sekali -> stok berkurang 2
        DB::table('alats')->where('id', $monitor)->decrement('stok', 2);

        // Laptop Acer: 3 unit dipinjam, baru 1 dikonfirmasi kembali -> net stok berkurang 2
        DB::table('alats')->where('id', $laptop)->decrement('stok', 2);

        // Bola Basket: 2 dipinjam, 2 sudah dikembalikan penuh -> net 0, stok tidak berubah
        // Proyektor: belum disetujui, stok belum tersentuh sama sekali
    }
}
