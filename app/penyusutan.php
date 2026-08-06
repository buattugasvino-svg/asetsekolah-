<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyusutan extends Model
{
    protected $table = 'penyusutan';
    protected $primaryKey = 'id_penyusutan';

    protected $fillable = [
        'id_barang',
        'nilai_penyusutan',
    ];

    // Relasi ke Barang (Penyusutan milik 1 Barang)
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}