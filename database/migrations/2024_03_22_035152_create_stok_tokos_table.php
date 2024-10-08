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
        Schema::create('stok_tokos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_suratjalan')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('toko_id');
            $table->timestamps();

            $table->foreign('toko_id')->references('id')->on('tokos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_tokos');
    }
};
