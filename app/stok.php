<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stok';
    protected $primaryKey = 'id_stok';

    protected $fillable = [
        'id_barang',
        'jumlah',
    ];

    // Relasi ke Barang (Stok milik 1 Barang)
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}