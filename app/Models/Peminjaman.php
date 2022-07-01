<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjamans";
    protected $fillable = [
        'barangs_id',
        'users_id',
        'nama_peminjam',
        'jenis_peminjaman',
        'tujuan',
        'jumlah_pinjam',
        'tgl_pengajuan',
        'tgl_pinjam',
        'tgl_kembali',
        'surat_pinjam',
        // 'tgl_perpanjangan',
        'status_konfirmasis_id',
        'status_peminjamans_id',

    ];

    public function barangs() // relasi tabel posisi ke kryawan
    {
        return $this->belongsTo(Barang::class,'barangs_id'); //1 karyawan mempunyai 1 posisi
    }

    public function status_konfirmasis() // relasi tabel posisi ke kryawan
    {
        return $this->belongsTo(StatusKonfirmasi::class,'status_konfirmasis_id'); //1 karyawan mempunyai 1 posisi
    }

    public function status_peminjamans() // relasi tabel posisi ke kryawan
    {
        return $this->belongsTo(StatusPeminjaman::class,'status_peminjamans_id'); //1 karyawan mempunyai 1 posisi
    }

    public function users() // relasi tabel posisi ke kryawan
    {
        return $this->belongsTo(User::class,'users_id', 'id'); //1 karyawan mempunyai 1 posisi
    }
    
}

