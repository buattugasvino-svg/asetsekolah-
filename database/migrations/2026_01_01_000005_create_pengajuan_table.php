<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan'); // Primary Key
            
            // Foreign Key ke tabel barang
            $table->foreignId('id_barang')
                  ->constrained('barang', 'id_barang')
                  ->onDelete('cascade');
                  
            $table->text('deskripsi');
            $table->string('status', 20)->default('Pending');
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
        Schema::dropIfExists('pengajuan');
    }
}