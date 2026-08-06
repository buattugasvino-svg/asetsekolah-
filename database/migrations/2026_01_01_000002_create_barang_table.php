<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang'); // Primary Key
            
            // Foreign Key ke tabel kategori
            $table->foreignId('id_kategori')
                  ->constrained('kategori', 'id_kategori')
                  ->onDelete('cascade');
                  
            $table->string('nama_barang', 100);
            $table->string('kode_barang', 20)->unique();
            $table->string('kondisi', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}