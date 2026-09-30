<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('id_alat')->constrained('alats')->onDelete('cascade');
            $table->foreignId('id_petugas')->nullable()->constrained('petugas')->nullOnDelete();
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_rencana_kembali');
            $table->integer('jumlah');
            $table->string('status')->default('Menunggu Persetujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
