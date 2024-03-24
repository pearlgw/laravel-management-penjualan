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
        Schema::create('stok_gudangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gudang_id');
            $table->timestamps();

            $table->foreign('gudang_id')->references('id')->on('gudangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_gudangs');
    }
};
