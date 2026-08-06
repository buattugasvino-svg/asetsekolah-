<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyusutanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyusutan', function (Blueprint $table) {
            $table->id('id_penyusutan'); // Primary Key
            
            // Foreign Key ke tabel barang
            $table->foreignId('id_barang')
                  ->constrained('barang', 'id_barang')
                  ->onDelete('cascade');
                  
            $table->decimal('nilai_penyusutan', 12, 2);
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
        Schema::dropIfExists('penyusutan');
    }
}