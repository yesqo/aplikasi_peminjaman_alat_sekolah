<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $fillable = [
        'id_siswa',
        'id_alat',
        'id_petugas',
        'tanggal_peminjaman',
        'tanggal_rencana_kembali',
        'jumlah',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'id_alat', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id');
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class, 'id_peminjaman', 'id');
    }

    public function getTotalDikembalikanAttribute()
    {
        return $this->pengembalian()->where('status', 'Dikonfirmasi')->sum('jumlah');
    }

    public function getSisaBelumKembaliAttribute()
    {
        $totalDiklaim = $this->pengembalian()
            ->whereIn('status', ['Menunggu Konfirmasi', 'Dikonfirmasi'])
            ->sum('jumlah');

        return $this->jumlah - $totalDiklaim;
    }
}
