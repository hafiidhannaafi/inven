<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;
    protected $table = "detail_peminjamans";
    protected $fillable = [

        'barangs_id',
        'jumlah_pinjam',
    ];

    public function peminjamans()
    {

        return $this->hasMany(peminjamans::class);
    }
        public function barangs() 
    {

        return $this->belongsTo(Barang::class, 'barangs_id');
    }

  

}
