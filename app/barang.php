<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_kategori',
        'nama_barang',
        'kode_barang',
        'kondisi',
    ];

    // Relasi ke Kategori (Barang milik 1 Kategori)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    // Relasi ke Stok (1 Barang punya banyak data Stok)
    public function stok()
    {
        return $this->hasMany(Stok::class, 'id_barang', 'id_barang');
    }

    // Relasi ke Penyusutan (1 Barang punya banyak data Penyusutan)
    public function penyusutan()
    {
        return $this->hasMany(Penyusutan::class, 'id_barang', 'id_barang');
    }

    // Relasi ke Pengajuan (1 Barang punya banyak Pengajuan)
    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'id_barang', 'id_barang');
    }
}