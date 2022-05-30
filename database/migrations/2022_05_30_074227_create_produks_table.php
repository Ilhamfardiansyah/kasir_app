<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('suplaier_id');
            $table->foreignId('user_id');
            $table->string('nama_produk');
            $table->string('kode_produk')->unique();
            $table->string('barcode')->unique();
            $table->string('stok');
            $table->integer('harga_jual');
            $table->integer('harga_beli');
            $table->integer('total_harga');
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
        Schema::dropIfExists('produks');
    }
}
