<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_jenis_barang');
            $table->unsignedBigInteger('id_pemasok');
            $table->string('kode_barang');
            $table->string('nama');
            $table->integer('harga_beli');
            $table->integer('harga_jual')->nullable();

            $table->foreign('id_jenis_barang')->references('id')->on('jenis_barangs');
            $table->foreign('id_pemasok')->references('id')->on('pemasoks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
