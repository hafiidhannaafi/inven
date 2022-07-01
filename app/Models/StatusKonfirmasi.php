<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKonfirmasi extends Model
{
    use HasFactory;
    protected $table = "status_konfirmasis";
    protected $fillable = [
        'status_konfirmasi'
    ];

    public function peminjamans() //relasi tabel employee ke jenis posisi
    {

        return $this->hasMany(Peminjaman::class);
    }

}
